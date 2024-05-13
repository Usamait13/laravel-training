<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string("name")->nullable();
            $table->string("email")->unique();
            $table->string("cnic")->unique();
            $table->string("phone")->unique();
            $table->string("address")->nullable();
            $table->string("profile_pic")->nullable();
            $table->string("degree")->nullable();
            $table->boolean("is_deleted")->default(false);
            $table->boolean("status")->default(true);
            $table->string("password")->nullable();
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
        Schema::dropIfExists('teachers');
    }
}
