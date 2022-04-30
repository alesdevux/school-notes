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
      'curse' => $this->faker->word,
      'year' => Carbon::now()->year,
      'user_id' => $this->faker->numberBetween(1, 10),
    ];
  }
}
