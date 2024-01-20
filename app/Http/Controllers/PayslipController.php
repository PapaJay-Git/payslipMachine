<?php

namespace App\Http\Controllers;

use App\Models\EmployeeContribution;
use App\Models\EmployeeDeduction;
use App\Models\EmployeeFinalPost;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class PayslipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // $emp = EmployeeFinalPost::all();

        // $emp = EmployeeDeduction::all();

        // $emp = EmployeeContribution::all();

        // dd($emp);

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


        return Inertia::render('Payslip', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id = null)
    {
        return Inertia::render('PrintPayslip');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
