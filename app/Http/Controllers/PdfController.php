<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class PdfController extends Controller
{
    private $basic = 0;
    private $basicPay = 0;
    private $basicHrs = 0;
    private $basicDays = 0;
    private $holidayHrs = 0;
    private $holidayDA = 0;
    private $slvlHrs = 0;
    private $slvlDays = 0;
    private $overtimeHrs= 0;
    private $overtimeDA= 0;
    private $overallDays = 0;
    private $totalcontri = 0;
    private $totaldeduc = 0;
    private $totalearnings = 0;
    private $otherdeduc = 0;
    private $net = 0;

    public function calculateData($data) : void
    {
        // BASIC PAY
        $this->basic = $data['days'] - $data['slvl_hrs'] - $data['holiday_hrs'] - $data['offdays'];
        $this->basicPay = $data['pay_rate'] * $this->basic;
        $this->basicHrs = $this->basicPay / (($this->basicPay / $this->basic) / 8);
        $this->basicDays = $this->basicHrs / 8;

        // HOLIDAYS
        $this->holidayHrs =  ($data['holiday_amount'] / $data['pay_rate']) * 8;
        $this->holidayDA = $data['holiday_hrs'] != 0 ? $data['holiday_amount'] / $data['holiday_hrs'] : 0;

        // SLVL
        $this->slvlHrs =  ($data['slvl_amount'] / $data['pay_rate']) * 8;
        $this->slvlDays = $data['slvl_hrs'] != 0 ? $data['pay_rate'] / $data['slvl_amount'] : 0;

        // OVERTIME
        $this->overtimeHrs =  ($data['slvl_amount'] / $data['pay_rate']) * 8;
        $this->overtimeDA = $data['ot_hrs'] != 0 ? ($data['pay_rate'] / 8) * 1.25 * 1 : 0;

        // OVERALL DAYS
        $this->overallDays = ($this->slvlDays + $this->basicDays + (($data['offdays'] * 8) / 8) + floatval($data['holiday_hrs']));

        // TOTAL FOR ALL FOOTER
        $this->totalcontri = floatval($data['sss_loan']) + floatval($data['sss_prem']) + floatval($data['pag_ibig_loan']) + floatval($data['pag_ibig_prem']) + floatval($data['philhealth']);
        $this->totaldeduc = floatval($data['advance']) + floatval($data['charge']) + floatval($data['uniform']) + floatval($data['bond_deposit']) + floatval($data['meal']) + floatval($data['misc']) + floatval($data['mutual_charge']);
        $this->totalearnings = ($this->basicPay + floatval($data['ot_amount']) + floatval($data['holiday_amount']) + floatval($data['nightdif_amount']) + floatval($data['offdays_amount']) + floatval($data['slvl_amount']) + floatval($data['late_amount']) + floatval($data['udt_amount']) + floatval($data['ctlate_amount']));
        $this->otherdeduc = floatval($data['late_amount']) + floatval($data['udt_amount']) + floatval($data['ctlate_amount']);
        $this->net = floatval($this->totalearnings - ($this->otherdeduc + $this->totalcontri + $this->totaldeduc));
    }

    public function generatePdf()
    {
        $data = User::leftJoin('emp_final_posts', 'app_users.employee_number', '=', 'emp_final_posts.employee_no')
        ->leftJoin('employee_deductions', 'emp_final_posts.employee_no', '=', 'employee_deductions.employee_no')
        ->leftJoin('employee_contributions', 'emp_final_posts.employee_no', '=', 'employee_contributions.employee_no')
        ->leftJoin('employees', 'emp_final_posts.employee_no', '=', 'employees.employee_no')
        ->where('app_users.employee_number', Auth::user()->employee_number)
        ->where('emp_final_posts.status', '1')
        ->select(
            [
                'emp_final_posts.*',
                'employee_deductions.advance',
                'employee_deductions.charge',
                'employee_deductions.meal',
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
                'employees.rank_file',
                'employees.job_status',
                'employees.pay_rate',
                'employees.job_title',
                'employees.fullname',
            ]
        )
        ->first();

        if($data == NULL){
            return redirect('/payslip');
       }

       $this->calculateData($data);

        // return view('pdf.view');
        $pdf = PDF::loadView('pdf.view',
                [
                    'data' => $data,
                    'basic' => $this->basic,
                    'basicPay' => $this->basicPay,
                    'basicHrs' => $this->basicHrs,
                    'basicDays' => $this->basicDays,
                    'holidayHrs' => $this->holidayHrs,
                    'holidayDA' => $this->holidayDA,
                    'slvlHrs' => $this->slvlHrs,
                    'slvlDays' => $this->slvlDays,
                    'overtimeHrs' => $this->overtimeHrs,
                    'overtimeDA' => $this->overtimeDA,
                    'overallDays' => $this->overallDays,
                    'totalcontri' => $this->totalcontri,
                    'totaldeduc' => $this->totaldeduc,
                    'totalearnings' => $this->totalearnings,
                    'otherdeduc' => $this->otherdeduc,
                    'net' => $this->net,
                ]
        );

        // $pdfPath = 'public/pdf/' . uniqid() . '.pdf';

        // Storage::put($pdfPath, $pdf->output());

        return $pdf->stream('document.pdf');
    }
}
