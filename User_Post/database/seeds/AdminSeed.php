<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->insert([
            [
                'username' => 'admin2204',
                'password' => Hash::make('123123123'),
                'full_name' => 'admin1234',
                'gender' => '1',
                'email' => 'admin123@gmail.com'
            ],

        ]);
    }
}
