<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommonCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('common_course', function (Blueprint $table) {
           $table->id();
           $table->bigInteger('course_id')->unsigned();
           $table->foreign('course_id')->references('id')->on('courses')
           ->onDelete('cascade')->onUpdate('cascade');
           $table->bigInteger('common_id')->unsigned();
           $table->foreign('common_id')->references('id')->on('commons')
           ->onDelete('cascade')->onUpdate('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('common_course');
    }
}
