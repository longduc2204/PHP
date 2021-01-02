<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserPermssionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_permission')->insert([
            ['user_id' => '1','permission_id' => '1'],
        ]);
    }
}
