<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('login')->unique();
            $table->string('role')->default('user');
            $table->string('password');
            $table->timestamps();
        });

        \App\Models\User::create([
           'login' => 'admin',
            'role' => 'admin',
            'password'=> bcrypt(123456),
        ]);

        \App\Models\User::create([
            'login' => 'moder',
            'role' => 'moder',
            'password'=> bcrypt(123456),
        ]);

        \App\Models\User::create([
            'login' => 'user',
            'role' => 'user',
            'password'=> bcrypt(123456),
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
