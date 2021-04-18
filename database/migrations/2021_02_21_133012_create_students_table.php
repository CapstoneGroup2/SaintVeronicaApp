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
        Schema::dropIfExists('students');
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('student_image')->nullable();
            $table->string('student_first_name');
            $table->string('student_middle_name')->nullable();
            $table->string('student_last_name');
            $table->string('student_email')->unique();
            $table->string('student_home_contact');
            $table->string('student_address');
            $table->integer('student_age');
            $table->date('student_birth_date');
            $table->string('student_gender');
            $table->string('student_mother_name')->nullable();
            $table->string('student_mother_contact_number')->nullable();
            $table->string('student_father_name')->nullable();
            $table->string('student_father_contact_number')->nullable();
            $table->string('student_guardian_name');
            $table->string('student_guardian_contact_number');
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
