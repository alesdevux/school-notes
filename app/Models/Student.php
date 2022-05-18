<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model {
  use HasFactory;

  protected $fillable = [
    'course',
    'first_trimester',
    'second_trimester',
    'third_trimester',
    'final_grade',
    'user_id',
  ];
  
  public function user() {
    return $this->belongsTo(User::class);
  }
  
  public function notes() {
    return $this->hasMany(Note::class);
  }
}
