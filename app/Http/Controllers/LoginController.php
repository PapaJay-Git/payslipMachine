<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
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
            $user = User::where('employee_number', $request->employee_number)->first();

            if (!$user) {
                throw ValidationException::withMessages([
                    'employee_number' => 'Invalid employee number.',
                ]);
            }

            Session::put('employee_number', $user->employee_number);

            return redirect()->route('login.show');

        } else {
            // If employee_number is not set or empty
            return Inertia::render('EmployeeNumberPage');
        }
    }


    public function check_employee_number(Request $request){



    }
}
