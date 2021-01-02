<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestCategory extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->insert([
            ['name' => 'New'],
            ['name' => 'Car'],
            ['name' => 'Fashion'],
            ['name' => 'long'],
            ['name' => 'linh'],
            ['name' => 'thoi su'],
            ['name' => 'tin nong'],
            ['name' => 'su kien'],
            ['name' => 'am nhac'],
        ]);
    }
}
