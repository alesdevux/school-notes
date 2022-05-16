<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('students', function (Blueprint $table) {
      $table->id();
      $table->string('course');
      $table->float('first_trimester');
      $table->float('second_trimester');
      $table->float('third_trimester');
      $table->float('final_grade');

      $table->unsignedBigInteger('user_id');
      $table->foreign('user_id')->references('id')->on('users');
      
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('students');
  }
};
