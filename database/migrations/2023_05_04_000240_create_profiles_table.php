<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');;
            $table->unsignedBigInteger('user_id');
            $table->string('user_image')->nullable();
            $table->enum('age', ['20代', '30代', '40代', '50代', '60代', '70代', '80代'])->nullable();
            $table->string('gender')->nullable();
            $table->enum('school_type', ['小学校', '中学校', '高校'])->nullable();
            $table->string('school_year')->nullable();
            $table->string('subject')->nullable();
            $table->string('club')->nullable();
            $table->text('comment')->nullable();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
