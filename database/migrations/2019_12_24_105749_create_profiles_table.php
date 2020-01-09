<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('employee_id')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();

            $table->string('department')->nullable();
            $table->string('designation')->nullable();
            $table->string('joining_date')->nullable();
            $table->integer('joining_salary')->nullable();
            $table->integer('current_salary')->nullable();

            $table->string('photo')->nullable();
            $table->string('father_name')->nullable();
            $table->string('birth_day')->nullable();
            $table->string('gender')->nullable();
            $table->integer('phone')->nullable();
            $table->string('local_addrss')->nullable();
            $table->string('parmanent_addrss')->nullable();

            $table->string('resume')->nullable();
            $table->string('offer_letter')->nullable();
            $table->string('joining_letter')->nullable();
            $table->string('agreement')->nullable();
            $table->string('id_proof')->nullable();

            $table->string('account_name')->nullable();
            $table->string('account_number')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('branch')->nullable();
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
        Schema::dropIfExists('profiles');
    }
}
