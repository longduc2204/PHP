<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call([
            AddPermissionInDB::class,
            UserPermssionSeeder::class,
            AdminSeed::class,
            TestPost::class,
            TestPostCategory::class,
            TestCategory::class
         ]);
    }
}

class AddPermissionInDB extends Seeder{
    public function run(){
        DB::table('permission')->insert([
            ['name' => 'admin','description' => 'quan ly'],
            ['name' => 'user' , 'description' => 'nguoi dung'],
        ]);
    }
}



