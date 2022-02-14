<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('jobID');
            $table->unsignedInteger('u_id');
            $table->string('username');
            $table->unsignedInteger('c_id');
            $table->string('jobtit');
            $table->string('typerole');
            $table->string('postlev');
            $table->string('stat')->default('0');
            $table->foreign('u_id')
            ->references('id')
            ->on('users');
            $table->foreign('c_id')
            ->references('id')
            ->on('companies');
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
        Schema::dropIfExists('applicants');
    }
}
