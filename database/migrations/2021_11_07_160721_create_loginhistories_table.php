<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoginhistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loginhistories', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('u_id')->nullable();
            $table->unsignedInteger('c_id')->nullable();
            $table->string('device');
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
        Schema::dropIfExists('loginhistories');
    }
}
