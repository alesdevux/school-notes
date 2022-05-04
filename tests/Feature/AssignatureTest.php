<?php

namespace Tests\Feature;

use App\Models\Assignature;
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

  public function test_assignature_can_be_updated() {
    $this->withoutExceptionHandling();

    $user = User::factory()->create([ 'id' => 11 ]);
    $login = Auth::loginUsingId($user->id);
    $this->actingAs($login);

    $assignature = Assignature::factory()->create([
      'name' => 'Test Assignature',
      'description' => 'Test Description',
      'curse' => 'Test Curse',
      'year' => Carbon::now()->year,
      'user_id' => 11,
    ]);

    $response = $this->put(route('assignatures.update', $assignature->id), [
      'name' => 'Test Assignature Updated',
      'description' => 'Test Description Updated',
      'curse' => 'Test Curse Updated',
      'year' => Carbon::now()->year,
      'user_id' => 11,
    ]);

    $response->assertStatus(302);
    $this->assertDatabaseHas('assignatures', [
      'name' => 'Test Assignature Updated',
      'description' => 'Test Description Updated',
      'curse' => 'Test Curse Updated',
      'year' => Carbon::now()->year,
      'user_id' => 11,
    ]);
    $response->assertRedirect('/assignatures');
  }

  public function test_assignature_can_be_deleted() {
    $this->withoutExceptionHandling();

    $user = User::factory()->create([ 'id' => 12 ]);
    $login = Auth::loginUsingId($user->id);
    $this->actingAs($login);

    $assignature = Assignature::factory()->create([
      'name' => 'Test Assignature Deleted',
      'description' => 'Test Description Deleted',
      'curse' => 'Test Curse',
      'year' => Carbon::now()->year,
      'user_id' => 12,
    ]);

    $response = $this->delete(route('assignatures.destroy', $assignature->id));

    $response->assertStatus(302);
    $this->assertDatabaseMissing('assignatures', [
      'name' => 'Test Assignature Deleted',
      'description' => 'Test Description Deleted',
      'curse' => 'Test Curse',
      'year' => Carbon::now()->year,
      'user_id' => 12,
    ]);
    $response->assertRedirect('/assignatures');
  }
}
