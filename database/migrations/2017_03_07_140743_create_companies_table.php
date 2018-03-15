<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('fname');
            $table->string('sname');
            $table->string('website');
            $table->string('typeOfBusiness');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('password');
            $table->string('industry')->nullable();
            $table->string('noEmployee')->nullable();
            $table->string('address')->nullable();
            $table->string('qualification')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('about')->nullable();
            $table->string('image')->default('images/company/default.png');
            $table->string('logo')->nullable();
            $table->string('lga')->nullable();
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
        Schema::dropIfExists('companies');
    }
}
