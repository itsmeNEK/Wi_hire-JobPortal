<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('lname');
            $table->string('mname')->nullable();
            $table->string('email')->unique();
            $table->string('mob_num')->nullable();
            $table->string('dob')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('province')->nullable();
            $table->string('city')->nullable();
            $table->string('barangay')->nullable();
            $table->string('civilstat')->nullable();
            $table->string('bithplace')->nullable();
            $table->string('street')->nullable();
            $table->string('postcode')->nullable();
            $table->string('gender')->nullable();
            $table->string('HBnum')->nullable();
            $table->string('password');
            $table->string('prof_pic')->nullable();
            $table->string('stat')->default('1');
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
