<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('users');
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('role_id');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->string('user_image')->nullable();
            $table->string('user_first_name');
            $table->string('user_middle_name')->nullable();
            $table->string('user_last_name');
            $table->string('user_email');
            $table->string('password');
            $table->string('user_contact')->nullable();
            $table->string('user_address')->nullable();
            $table->string('user_gender')->nullable();
            $table->string('user_status')->nullable();
            $table->integer('user_active_status');
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
        Schema::dropIfExists('users');
    }
}
