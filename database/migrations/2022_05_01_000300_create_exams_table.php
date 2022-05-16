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
    Schema::create('exams', function (Blueprint $table) {
      $table->id();
      $table->date('date');

      $table->unsignedBigInteger('assignature_id');
      $table->foreign('assignature_id')->references('id')->on('assignatures');
      
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('exams');
  }
};
