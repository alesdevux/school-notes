<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Notes>
 */
class NoteFactory extends Factory {
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition() {
    return [
      'note' => $this->faker->randomFloat(1,0, 10),
      'student_id' => $this->faker->numberBetween(1, 2),
      'exam_id' => $this->faker->numberBetween(1, 10),
    ];
  }
}
