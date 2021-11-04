<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProfWorkExesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_prof_work_exes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('postit');
            $table->string('comname');
            $table->string('durationfrom');
            $table->string('durationto');
            $table->string('specialization');
            $table->string('role');
            $table->string('country');
            $table->string('positionlevel');
            $table->string('salary');
            $table->string('industry');
            $table->string('additional');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
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
        Schema::dropIfExists('user_prof_work_exes');
    }
}
