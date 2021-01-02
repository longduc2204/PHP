<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class TestPostCategory extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('post_category')->insert([
            [

                'post_id' => '1',
                'category_id' => '1',
            ],
            [

                'post_id' => '1',
                'category_id' => '2',
            ],
            [

                'post_id' => '1',
                'category_id' => '3',
            ],
            [

                'post_id' => '2',
                'category_id' => '3',
            ],
            [

                'post_id' => '2',
                'category_id' => '1',
            ],

        ]);
    }
}
