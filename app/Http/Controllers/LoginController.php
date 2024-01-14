<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;

class LoginController extends Controller
{
    //

    public function index(){

        return Inertia::render('EmployeeNumberPage');

    }

    public function check_employee_number(Request $request){


        $count = User::where('employee_number', $request->employee_number)->count();

        if ($count == 0) {

            throw ValidationException::withMessages([
                'employee_number' => 'Invalid employee number.',
            ]);

        }

        return Inertia::render('Auth/Login', [
            'status' => session('status'),
        ]);
    }
}
