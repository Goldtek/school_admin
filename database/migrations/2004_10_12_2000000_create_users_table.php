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
            $table->increments('id');
            $table->string('fname');
            $table->string('sname');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('password');
            $table->date('dob')->nullable();
            $table->string('address')->nullable();
            $table->integer('salary')->nullable();
            $table->integer('industry')->nullable();
            $table->integer('joblevel')->nullable();
            $table->string('hedu')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('about')->nullable();
            $table->string('job')->nullable();
            $table->string('cv')->nullable();
            $table->string('google')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkin')->nullable();
            $table->string('facebook')->nullable();
            $table->string('image')->default('images/users/default.png');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
