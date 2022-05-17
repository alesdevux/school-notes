<?php

use App\Http\Controllers\AssignatureController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PageController::class, 'index'])->name('welcome');

Route::middleware([
  'auth:sanctum',
  config('jetstream.auth_session'),
  'verified',
])->group(function () {
  Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');

  Route::resource('assignatures', AssignatureController::class);
  Route::get('/assignatures', [AssignatureController::class, 'index'])->name('assignatures.index');
  Route::get('/assignatures/create', [AssignatureController::class, 'create'])->name('assignatures.create');
});
