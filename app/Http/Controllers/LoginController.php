<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;

class LoginController extends Controller
{
    //
    public function index(Request $request)
    {

        Session::forget('employee_number');

        if (isset($request->employee_number) && !empty($request->employee_number)) {
            $appUsersTable = User::where('employee_number', $request->employee_number)->first();

            $employeesTable = Employee::where('employee_no', $request->employee_number)->first();

            if (!$appUsersTable && !$employeesTable) {
                throw ValidationException::withMessages([
                    'employee_number' => 'Invalid employee number.',
                ]);
            }

            if($appUsersTable){
                Session::put('employee_number', $appUsersTable->employee_number);
                return redirect()->route('login.show');
            }elseif(!$appUsersTable && $employeesTable){

                DB::beginTransaction();
                try{

                    User::create([
                    'name' => $employeesTable->fullname,
                    'employee_number' => $employeesTable->employee_no,
                    'password' => Hash::make('123456')
                    ]);

                    DB::commit();

                    Session::put('employee_number', $request->employee_number);
                    return redirect()->route('login.show');

                }catch(\Exception $e){

                    DB::rollback();

                    throw ValidationException::withMessages([
                        'employee_number' => 'Error occured while registering your account. Please contact IT support.',
                    ]);
                }
            }

        } else {
            $message = session('message', '');
            Session::forget('message');
            return Inertia::render('EmployeeNumberPage', [
                'message' => $message
            ]);
        }
    }


    public function check_employee_number(Request $request){



    }
}
