<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory {
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition() {
    return [
      'course' => $this->faker->word,
      'first_trimester' => $this->faker->randomFloat(1, 0, 10),
      'second_trimester' => $this->faker->randomFloat(1, 0, 10),
      'third_trimester' => $this->faker->randomFloat(1, 0, 10),
      'final_grade' => $this->faker->randomFloat(1, 0, 10),
      'user_id' => $this->faker->numberBetween(1, 10),
    ];
  }
}
