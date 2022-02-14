<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVerifyCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verify_companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->nullable();
            $table->string('comany_email')->nullable();
            $table->unsignedInteger('comany_id')->nullable();
            $table->foreign('comany_id')
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
        Schema::dropIfExists('verify_companies');
    }
}
