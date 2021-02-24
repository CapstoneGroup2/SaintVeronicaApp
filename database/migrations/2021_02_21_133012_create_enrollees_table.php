<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnrolleesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrollees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('enrollee_first_name');
            $table->string('enrollee_middle_name');
            $table->string('enrollee_last_name');
            $table->string('enrollee_email');
            $table->string('enrollee_address');
            $table->string('enrollee_gender');
            $table->integer('enrollee_age');
            $table->date('enrollee_birth_date');
            $table->string('enrollee_status');
            $table->integer('enrollee_active_status');
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
        Schema::dropIfExists('enrollees');
    }
}
