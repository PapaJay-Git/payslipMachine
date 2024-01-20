<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PdfController extends Controller
{
    private function calculateTotalDeductions($data) {
        $advance = $data['advance'];
        $charge = $data['charge'];
        $canteen = $data['canteen'];
        $misc = $data['misc'];
        $uniform = $data['uniform'];
        $bondDeposit = $data['bond_deposit'];
        $mutualCharge = $data['mutual_charge'];

        $total = $advance + $charge + $canteen + $misc + $uniform + $bondDeposit + $mutualCharge;

        return $total;
    }

    private function calculateGrossEarnings($data) {
        $basic_pay = $data['no_days_sched'] * $data['pay_rate'];
        $ot_amount = $data['ot_amount'];
        $holiday_amount = $data['holiday_amount'];
        $nightdif_amount = $data['nightdif_amount'];
        $late_amount = $data['late_amount'];
        $slvl_amount = $data['slvl_amount'];
        $udt_amount = $data['udt_amount'];

        $total = ($basic_pay + $ot_amount + $holiday_amount + $nightdif_amount + $slvl_amount + $udt_amount) - $late_amount;

        return $total;
    }

    private function calculateTotalContributions($data) {
        $sss_loan = $data['sss_loan'];
        $pag_ibig_loan = $data['pag_ibig_loan'];
        $mutual_loan = $data['mutual_loan'];
        $sss_prem = $data['sss_prem'];
        $pag_ibig_prem = $data['pag_ibig_prem'];
        $philhealth = $data['philhealth'];

        $total = $sss_loan + $pag_ibig_loan + $mutual_loan + $sss_prem + $pag_ibig_prem + $philhealth;

        return $total;
    }

    public function generatePdf()
    {
        $data = User::leftJoin('emp_final_posts_test', 'app_users.employee_number', '=', 'emp_final_posts_test.employee_no')
        ->leftJoin('employee_deductions', 'emp_final_posts_test.employee_no', '=', 'employee_deductions.employee_no')
        ->leftJoin('employee_contributions', 'emp_final_posts_test.employee_no', '=', 'employee_contributions.employee_no')
        ->leftJoin('employees', 'emp_final_posts_test.employee_no', '=', 'employees.employee_no')
        ->leftJoin('departments', 'employees.department', '=', 'departments.dept_code')
        ->where('app_users.employee_number', Auth::user()->employee_number)
        ->where('emp_final_posts_test.status', 'finished')
        ->select(
            [
                'emp_final_posts_test.*',
                'employee_deductions.advance',
                'employee_deductions.charge',
                'employee_deductions.canteen',
                'employee_deductions.misc',
                'employee_deductions.uniform',
                'employee_deductions.bond_deposit',
                'employee_deductions.mutual_charge',
                'employee_contributions.sss_loan',
                'employee_contributions.pag_ibig_loan',
                'employee_contributions.mutual_loan',
                'employee_contributions.sss_prem',
                'employee_contributions.pag_ibig_prem',
                'employee_contributions.philhealth',
                'departments.department',
                'employees.rank_file',
                'employees.job_status',
                'employees.pay_rate',
                'employees.job_title',
            ]
        )
        ->first();


        $calculateGrossEarnings = $this->calculateGrossEarnings($data);
        $calculateTotalDeductions = $this->calculateTotalDeductions($data);
        $calculateTotalContributions = $this->calculateTotalContributions($data);

        // return view('pdf.view');
        $pdf = PDF::loadView('pdf.view',
                [
                    'data' => $data,
                    'calculateTotalContributions' => $calculateTotalContributions,
                    'calculateTotalDeductions' => $calculateTotalDeductions,
                    'calculateGrossEarnings' => $calculateGrossEarnings

                ]
        );

        // $pdfPath = 'public/pdf/' . uniqid() . '.pdf';

        // Storage::put($pdfPath, $pdf->output());

        return $pdf->stream('document.pdf');
    }
}
