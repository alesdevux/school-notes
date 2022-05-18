<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignature extends Model {
  use HasFactory;

  protected $fillable = [
    'name',
    'description',
    'course',
    'year',
    'user_id',
  ];
  
  public function user() {
    return $this->belongsTo(User::class);
  }
  
  public function exams() {
    return $this->hasMany(Exam::class);
  }
}
