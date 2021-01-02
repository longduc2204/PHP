<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('username', 45)->nullable();
            $table->string('password', 255)->nullable();
            $table->string('full_name', 45)->nullable();
            $table->boolean('gender')->nullable();
            $table->string('email', 255)->nullable();
            $table->string('featue_url', 255)->nullable();
            $table->string('remember_token', 255)->nullable();
            $table->string('email_verified_at', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
}
