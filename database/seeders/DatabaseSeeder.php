<?php

namespace Database\Seeders;

use App\Models\Assignature;
use App\Models\Exam;
use App\Models\Note;
use App\Models\Student;
use App\Models\User;
use Carbon\Carbon;
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
      'name' => 'Admin',
      'email' => 'admin@gmail.com',
      'is_admin' => true,
    ]);
    User::factory()->create([
      'name' => 'Professor1',
      'email' => 'professor1@gmail.com',
      'is_professor' => true,
    ]);
    User::factory()->create([
      'name' => 'Tutor1',
      'email' => 'tutor1@gmail.com',
      'is_tutor' => true,
    ]);
    Student::factory()->create([
      'user_id' => User::factory()->create([
        'name' => 'User1',
        'email' => 'user1@gmail.com',
      ])->id,
      'course' => '1 ESO',
    ]);
    Student::factory()->create([
      'user_id' => User::factory()->create([
        'name' => 'User2',
        'email' => 'user2@gmail.com',
      ])->id,
      'course' => '1 BATX',
    ]);
    Student::factory()->create([
      'user_id' => User::factory()->create([
        'name' => 'User3',
        'email' => 'user3@gmail.com',
      ])->id,
      'course' => '1 ESO',
    ]);

    Assignature::factory()->create([
      'name' => 'Maths',
      'user_id' => User::where('name', 'Professor1')->first()->id,
      'course' => '1 ESO',
    ]);
    Assignature::factory()->create([
      'name' => 'English',
      'user_id' => User::factory()->create([
        'name' => 'Professor2',
        'email' => 'professor2@gmail.com',
        'is_professor' => true,
      ])->id,
      'course' => '1 ESO',
    ]);
    Assignature::factory()->create([
      'name' => 'Physics',
      'user_id' => User::factory()->create([
        'name' => 'Professor3',
        'email' => 'professor3@gmail.com',
        'is_professor' => true,
      ])->id,
      'course' => '1 ESO',
    ]);
    Assignature::factory()->create([
      'name' => 'Biology',
      'user_id' => User::where('name', 'Professor1')->first()->id,
      'course' => '1 ESO',
    ]);
    Assignature::factory()->create([
      'name' => 'Maths',
      'user_id' => User::where('name', 'Professor1')->first()->id,
      'course' => '1 BATX',
    ]);
    Assignature::factory()->create([
      'name' => 'Biology',
      'user_id' => User::where('name', 'Professor3')->first()->id,
      'course' => '1 BATX',
    ]);

    Exam::factory()->create([
      'date' => Carbon::now()->addDays(6),
      'assignature_id' => Assignature::where('name', 'Maths')->first()->id,
    ]);
    Exam::factory()->create([
      'date' => Carbon::now()->addDays(7),
      'assignature_id' => Assignature::where('name', 'English')->first()->id,
    ]);
    Exam::factory()->create([
      'date' => Carbon::now()->addDays(4),
      'assignature_id' => Assignature::where('name', 'Physics')->first()->id,
    ]);
    Exam::factory()->create([
      'date' => Carbon::now()->addDays(7),
      'assignature_id' => Assignature::where('name', 'Biology')->first()->id,
    ]);

    Note::factory()->create([
      'student_id' => Student::where('user_id', User::where('name', 'user1')->first()->id)->first()->id,
      'exam_id' => Exam::factory()->create([
        'date' => Carbon::now()->subDays(6),
        'assignature_id' => Assignature::where('name', 'Maths')->first()->id,
      ])->id,
    ]);
    Note::factory()->create([
      'student_id' => Student::where('user_id', User::where('name', 'user2')->first()->id)->first()->id,
      'exam_id' => Exam::factory()->create([
        'date' => Carbon::now()->subDays(7),
        'assignature_id' => Assignature::where('name', 'English')->first()->id,
      ])->id,
    ]);
    Note::factory()->create([
      'student_id' => Student::where('user_id', User::where('name', 'user1')->first()->id)->first()->id,
      'exam_id' => Exam::where('assignature_id', Assignature::where('name', 'Physics')->first()->id)->first()->id,
    ]);
    Note::factory()->create([
      'student_id' => Student::where('user_id', User::where('name', 'user2')->first()->id)->first()->id,
      'exam_id' => Exam::where('assignature_id', Assignature::where('name', 'Biology')->first()->id)->first()->id,
    ]);
  }
}
