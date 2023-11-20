<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'fname' => 'admin',
                'username' => 'Admin',
                'email' => 'admin@local.com',
                'password' => Hash::make('admin'),
                'role' => 2,
                'status' => 2
            ],
            [
                'fname' => 'member',
                'username' => 'Member',
                'email' => 'member@local.com',
                'password' => Hash::make('member'),
                'role' => 1,
                'status' => 2
            ]
        ]);
    }
}
