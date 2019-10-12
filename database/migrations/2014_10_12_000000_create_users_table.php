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
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->string('gender')->nullable();
            $table->string('phone')->nullable();
            $table->string('nationality')->nullable();
            $table->string('residential_address')->nullable();
            $table->string('state')->nullable();
            $table->string('lga')->nullable();
            $table->string('country_of_residence')->nullable();
            $table->string('academic_qualification')->nullable();
            $table->string('next_of_kin_name')->nullable();
            $table->string('next_of_kin_phone')->nullable();
            $table->string('occupation')->nullable();
            $table->string('job_role')->nullable();
            $table->string('profileimage')->nullable();
            $table->string('address')->nullable();
            $table->string('token')->nullable();
            $table->boolean('active')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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
