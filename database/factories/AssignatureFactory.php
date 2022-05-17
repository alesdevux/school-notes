<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Assignature>
 */
class AssignatureFactory extends Factory {
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition() {
    return [
      'name' => $this->faker->name,
      'description' => $this->faker->text,
      'course' => $this->faker->randomElement(['1 ESO', '2 ESO', '3 ESO', '4 ESO', '1 BATX', '2 BATX']),
      'year' => Carbon::now()->year,
      'user_id' => $this->faker->numberBetween(1, 10),
    ];
  }
}
