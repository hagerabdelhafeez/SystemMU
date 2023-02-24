<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('student_name')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('student_no');
            $table->string('mobile_number');
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
            $table->bigInteger('colleges_id')->unsigned();
            $table->foreign('colleges_id')->references('id')->on('colleges')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->bigInteger('departments_id')->unsigned();
            $table->foreign('departments_id')->references('id')->on('departments')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->bigInteger('class_id')->unsigned();
            $table->foreign('class_id')->references('id')->on('clas')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->bigInteger('years_id')->unsigned();
            $table->foreign('years_id')->references('id')->on('years')
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
        Schema::dropIfExists('students');
    }
}
