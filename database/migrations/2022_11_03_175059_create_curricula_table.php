<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurriculaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curricula', function (Blueprint $table) {
            $table->id();

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

            $table->bigInteger('semesters_id')->unsigned();
            $table->foreign('semesters_id')->references('id')->on('semesters')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->bigInteger('courses_id')->unsigned();
            $table->foreign('courses_id')->references('id')->on('courses')
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
        Schema::dropIfExists('curricula');
    }
}
