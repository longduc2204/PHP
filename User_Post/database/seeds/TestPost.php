<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestPost extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('post')->insert([
            [
                'title' => 'test1',
                'content' => 'testpost1',
            ],
            [
                'title' => 'test2',
                'content' => 'testpost2',
            ],


        ]);
    }
}
