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
      Schema::create('users', function (Blueprint $table) {
           $table->increments('id');
           $table->string('name');
           $table->string('email')->unique();
           $table->string('password');
           $table->string('address');
           $table->string('display_picture')->nullable();
           $table->enum('gender', ['male','female']);
           $table->integer('role_id')->unsigned();
           $table->foreign('role_id')->references('id')->on('roles');
           $table->enum('is_deleted', ['true','false'])->default('false');
           $table->rememberToken();
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
