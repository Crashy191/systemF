<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('users')->insert([
            [
            'name'=>'Administrador',
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('admin'),
            'role'=>'admin',
            'status'=>'active'
        ],
        [
            'name'=>'Vendor',
            'email'=>'vendor@gmail.com',
            'password'=>Hash::make('1234'),
            'role'=>'vendor',
            'status'=>'active'
        ],
        [
            'name'=>'Carlos customer',
            'email'=>'customer@gmail.com',
            'password'=>Hash::make('1234'),
            'role'=>'customer',
            'status'=>'active'
        ],
    ]);
    }
}
