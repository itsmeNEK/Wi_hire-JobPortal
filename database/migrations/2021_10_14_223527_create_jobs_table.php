<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('jobtit');
            $table->longText('jobdes');
            $table->string('qualification');
            $table->string('exreq');
            $table->string('special');
            $table->string('mimsal');
            $table->string('maxsal');
            $table->string('typerole');
            $table->string('postlev');
            $table->unsignedInteger('c_id');
            $table->string('prof_pic');
            $table->string('cname');
            $table->string('city');
            $table->string('memo')->nullable();
            $table->string('stat')->default('1');
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
        Schema::dropIfExists('jobs');
    }
}
