<?php

namespace Tests\Feature;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class AssignatureTest extends TestCase {
  use RefreshDatabase;

  public function test_assignature_can_be_created() {
    $this->withoutExceptionHandling();

    $user = User::factory()->create([ 'id' => 10 ]);
    $login = Auth::loginUsingId($user->id);
    $this->actingAs($login);

    $response = $this->post(route('assignatures.store'), [
      'name' => 'Test Assignature',
      'description' => 'Test Description',
      'curse' => 'Test Curse',
      'year' => Carbon::now()->year,
      'user_id' => 10,
    ]);

    $response->assertStatus(302);
    $this->assertDatabaseHas('assignatures', [
      'name' => 'Test Assignature',
      'description' => 'Test Description',
      'curse' => 'Test Curse',
      'year' => Carbon::now()->year,
      'user_id' => 10,
    ]);
    $response->assertRedirect('/assignatures');
  }
}
