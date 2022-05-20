<?php

namespace Tests\Feature;

use App\Models\Assignature;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Inertia\Testing\AssertableInertia as Assert;
use Tests\TestCase;

class AssignatureTest extends TestCase {
  use RefreshDatabase;

  public function test_assignature_can_be_created_if_user_is_admin() {
    $this->withoutExceptionHandling();

    $user = User::factory()->create([
      'id' => 10,
      'is_admin' => true,
    ]);
    $login = Auth::loginUsingId($user->id);
    $this->actingAs($login);

    $response = $this->post(route('assignatures.store'), [
      'name' => 'Test Create Assignature Admin',
      'description' => 'Test Description',
      'course' => 'Test Course',
      'year' => Carbon::now()->year,
      'user_id' => 10,
    ]);

    $response->assertStatus(302);
    $this->assertDatabaseHas('assignatures', [
      'name' => 'Test Create Assignature Admin',
      'description' => 'Test Description',
      'course' => 'Test Course',
      'year' => Carbon::now()->year,
      'user_id' => 10,
    ]);
    $response->assertRedirect('/assignatures');
  }

  public function test_assignature_can_not_be_created_if_user_is_student() {
    $this->withoutExceptionHandling();

    $user = User::factory()->create([
      'id' => 9,
      'is_admin' => false,
      'is_tutor' => false,
      'is_professor' => false,
    ]);
    $login = Auth::loginUsingId($user->id);
    $this->actingAs($login);

    $response = $this->post(route('assignatures.store'), [
      'name' => 'Test Create Assignature Student',
      'description' => 'Test Description',
      'course' => 'Test Course',
      'year' => Carbon::now()->year,
      'user_id' => 9,
    ]);

    $response->assertStatus(302);
    $this->assertDatabaseMissing('assignatures', [
      'name' => 'Test Create Assignature Student',
      'description' => 'Test Description',
      'course' => 'Test Course',
      'year' => Carbon::now()->year,
      'user_id' => 9,
    ]);
  }

  public function test_assignature_can_be_deleted_if_user_is_admin() {
    $this->withoutExceptionHandling();

    $user = User::factory()->create([
      'id' => 12,
      'is_admin' => true,
    ]);
    $login = Auth::loginUsingId($user->id);
    $this->actingAs($login);

    $assignature = Assignature::factory()->create([
      'name' => 'Test Admin Assignature Deleted',
      'description' => 'Test Description Deleted',
      'course' => 'Test Course',
      'year' => Carbon::now()->year,
      'user_id' => 12,
    ]);

    $response = $this->delete(route('assignatures.destroy', $assignature->id));

    $response->assertStatus(302);
    $this->assertDatabaseMissing('assignatures', [
      'name' => 'Test Admin Assignature Deleted',
      'description' => 'Test Description Deleted',
      'course' => 'Test Course',
      'year' => Carbon::now()->year,
      'user_id' => 12,
    ]);
    $response->assertRedirect('/assignatures');
  }

  public function test_assignature_can_not_be_deleted_if_user_is_student() {
    $this->withoutExceptionHandling();

    $user = User::factory()->create([
      'id' => 11,
      'is_admin' => false,
      'is_tutor' => false,
      'is_professor' => false,
    ]);
    $login = Auth::loginUsingId($user->id);
    $this->actingAs($login);

    $assignature = Assignature::factory()->create([
      'name' => 'Test Student Assignature Deleted',
      'description' => 'Test Description Deleted',
      'course' => 'Test Course',
      'year' => Carbon::now()->year,
      'user_id' => 11,
    ]);

    $response = $this->delete(route('assignatures.destroy', $assignature->id));

    $response->assertStatus(302);
    $this->assertDatabaseHas('assignatures', [
      'name' => 'Test Student Assignature Deleted',
      'description' => 'Test Description Deleted',
      'course' => 'Test Course',
      'year' => Carbon::now()->year,
      'user_id' => 11,
    ]);
  }

  public function test_assignature_can_be_viewed() {
    $this->withoutExceptionHandling();

    $user = User::factory()->create([ 'id' => 13 ]);
    $login = Auth::loginUsingId($user->id);
    $this->actingAs($login);

    $assignature = Assignature::factory()->create([
      'name' => 'Test Assignature Viewed',
      'description' => 'Test Description Viewed',
      'course' => 'Test Course',
      'year' => Carbon::now()->year,
      'user_id' => 13,
    ]);

    $response = $this->get(route('assignatures.show', $assignature->id));

    $response->assertStatus(200);
    $response->assertInertia(fn (Assert $page) => 
      $page->component('Assignatures/Show')
    );
  }

  public function test_assignature_can_be_edit_if_user_is_admin() {
    $this->withoutExceptionHandling();

    $user = User::factory()->create([
      'id' => 14,
      'is_admin' => true,
    ]);
    $login = Auth::loginUsingId($user->id);
    $this->actingAs($login);

    $assignature = Assignature::factory()->create([
      'name' => 'Test Assignature Edited',
      'description' => 'Test Description Edited',
      'course' => 'Test Course',
      'year' => Carbon::now()->year,
      'user_id' => 14,
    ]);

    $response = $this->get(route('assignatures.edit', $assignature->id));

    $response->assertStatus(200);
    $response->assertInertia(fn (Assert $page) => 
      $page->component('Assignatures/Edit')
    );
  }

  public function test_assignature_can_not_be_edit_if_user_is_student() {
    $this->withoutExceptionHandling();

    $user = User::factory()->create([
      'id' => 15,
      'is_admin' => false,
      'is_tutor' => false,
      'is_professor' => false,
    ]);
    $login = Auth::loginUsingId($user->id);
    $this->actingAs($login);

    $assignature = Assignature::factory()->create([
      'name' => 'Test Assignature Edited',
      'description' => 'Test Description Edited',
      'course' => 'Test Course',
      'year' => Carbon::now()->year,
      'user_id' => 15,
    ]);

    $response = $this->get(route('assignatures.edit', $assignature->id));

    $response->assertStatus(302);
    $this->assertDatabaseHas('assignatures', [
      'name' => 'Test Assignature Edited',
      'description' => 'Test Description Edited',
      'course' => 'Test Course',
      'year' => Carbon::now()->year,
      'user_id' => 15,
    ]);
  }

  public function test_assignature_can_be_updated_if_user_is_admin() {
    $this->withoutExceptionHandling();

    $user = User::factory()->create([
      'id' => 15,
      'is_admin' => true,
    ]);
    $login = Auth::loginUsingId($user->id);
    $this->actingAs($login);

    $assignature = Assignature::factory()->create([
      'name' => 'Test Assignature Updated',
      'description' => 'Test Description Updated',
      'course' => '1 ESO',
      'year' => Carbon::now()->year,
      'user_id' => 15,
    ]);

    $response = $this->patch(route('assignatures.update', $assignature->id), [
      'name' => 'Hola Test Assignature Updated Hola',
      'description' => 'Hola Test Description Updated',
      'course' => '1 BATX',
      'year' => Carbon::now()->year,
      'user_id' => 15,
    ]);

    $response->assertStatus(302);
    $this->assertDatabaseHas('assignatures', [
      'name' => 'Hola Test Assignature Updated Hola',
      'description' => 'Hola Test Description Updated',
      'course' => '1 BATX',
      'year' => Carbon::now()->year,
      'user_id' => 15,
    ]);
    $response->assertRedirect('/assignatures');
  }

  public function test_assignature_can_not_be_updated_if_user_is_student() {
    $this->withoutExceptionHandling();

    $user = User::factory()->create([
      'id' => 15,
      'is_admin' => false,
      'is_tutor' => false,
      'is_professor' => false,
    ]);
    $login = Auth::loginUsingId($user->id);
    $this->actingAs($login);

    $assignature = Assignature::factory()->create([
      'name' => 'Test Student Assignature Updated',
      'description' => 'Test Description Updated',
      'course' => '1 ESO',
      'year' => Carbon::now()->year,
      'user_id' => 15,
    ]);

    $response = $this->patch(route('assignatures.update', $assignature->id), [
      'name' => 'Hola Test Student Assignature Updated Hola',
      'description' => 'Hola Test Description Updated',
      'course' => '1 BATX',
      'year' => Carbon::now()->year,
      'user_id' => 15,
    ]);

    $response->assertStatus(302);
    $this->assertDatabaseHas('assignatures', [
      'name' => 'Test Student Assignature Updated',
      'description' => 'Test Description Updated',
      'course' => '1 ESO',
      'year' => Carbon::now()->year,
      'user_id' => 15,
    ]);
  }
}
