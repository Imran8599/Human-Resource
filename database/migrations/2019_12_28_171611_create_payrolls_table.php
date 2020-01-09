<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayrollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payrolls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('employee_no')->nullable();
            $table->string('month_year')->nullable();
            $table->string('earning_note')->nullable();
            $table->integer('earning_value')->nullable();
            $table->string('deduction_note')->nullable();
            $table->integer('deduction_value')->nullable();
            $table->integer('basic_salary')->nullable();
            $table->integer('net_salary')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('note')->nullable();
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
        Schema::dropIfExists('payrolls');
    }
}
