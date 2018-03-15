<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category');
            $table->string('jobExperience');
            $table->string('location');
            $table->string('jobType');
            $table->string('salary');
            $table->string('tags');
            $table->string('jobDetails');
            $table->string('company_id');
            $table->string('enddate');
            $table->string('noVacany');
            $table->string('specification');
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
        Schema::dropIfExists('jobs');
    }
}
