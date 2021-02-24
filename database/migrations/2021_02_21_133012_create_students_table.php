<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('student_first_name');
            $table->string('student_middle_name');
            $table->string('student_last_name');
            $table->string('student_email');
            $table->string('student_home_contact');
            $table->string('student_address');
            $table->string('student_gender');
            $table->integer('student_age');
            $table->date('student_birth_date');
            $table->string('student_status');
            $table->integer('student_active_status');
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
