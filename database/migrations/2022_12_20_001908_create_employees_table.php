<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('employee_name')->unique();
            $table->integer('mobile_number');
            $table->date('date_birth');
            $table->text('Address');
            $table->bigInteger('genders_id')->unsigned();
            $table->foreign('genders_id')->references('id')->on('genders')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->bigInteger('blood_id')->unsigned();
            $table->foreign('blood_id')->references('id')->on('blood_types')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->bigInteger('religons_id')->unsigned();
            $table->foreign('religons_id')->references('id')->on('religons')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->bigInteger('nationalities_id')->unsigned();
            $table->foreign('nationalities_id')->references('id')->on('nationalities')
            ->onDelete('cascade')
            ->onUpdate('cascade');
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
        Schema::dropIfExists('employees');
    }
}
