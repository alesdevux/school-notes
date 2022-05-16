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
    Schema::create('notes', function (Blueprint $table) {
      $table->id();
      $table->float('note');

      $table->unsignedBigInteger('student_id');
      $table->foreign('student_id')->references('id')->on('students');
      $table->unsignedBigInteger('exam_id');
      $table->foreign('exam_id')->references('id')->on('exams');
      
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('notes');
  }
};
