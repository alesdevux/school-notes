<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run() {
    User::factory()->create([
      'name' => 'admin',
      'email' => 'admin@gmail.com',
      'is_admin' => true,
    ]);
    User::factory()->create([
      'name' => 'professor1',
      'email' => 'professor1@gmail.com',
      'is_professor' => true,
    ]);
    User::factory()->create([
      'name' => 'tutor1',
      'email' => 'tutor1@gmail.com',
      'is_tutor' => true,
    ]);
    User::factory()->create([
      'name' => 'user1',
      'email' => 'user1@gmail.com'
    ]);
  }
}
