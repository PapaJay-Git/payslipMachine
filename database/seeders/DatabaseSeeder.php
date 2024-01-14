<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $password = '12345';

        $users = [
            [
                'name' => 'JC MAYO',
                'employee_number' => '12345',
            ]
        ];

        foreach($users as $user){
            User::create([
                'name' => $user['name'],
                'employee_number' => $user['employee_number'],
                'password' => Hash::make($password),
            ]);
        }
    }
}
