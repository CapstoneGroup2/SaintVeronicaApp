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
            $table->string('first_name', 50);
            $table->string('middle_name', 50)->nullable();
            $table->string('last_name', 50);
            $table->string('email', 225)->unique();
            $table->string('contact', 225);
            $table->string('address', 255);
            $table->date('birth_date');
            $table->string('gender');
            $table->string('mother_name', 50)->nullable();
            $table->string('mother_contact_number')->nullable();
            $table->string('father_name', 50)->nullable();
            $table->string('father_contact_number')->nullable();
            $table->string('guardian_name', 50);
            $table->string('guardian_contact_number');
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
