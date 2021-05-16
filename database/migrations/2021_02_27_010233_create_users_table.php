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
            $table->string('user_first_name', 50);
            $table->string('user_middle_name', 50)->nullable();
            $table->string('user_last_name', 50);
            $table->string('user_email', 225);
            $table->string('password');
            $table->string('user_contact');
            $table->string('user_address', 255)->nullable();
            $table->string('user_gender', 50)->nullable();
            $table->string('user_status', 50)->nullable();
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
