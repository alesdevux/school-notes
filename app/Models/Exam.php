<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model {
  use HasFactory;

  protected $fillable = [
    'date',
    'assignature_id',
  ];
  
  public function assignature() {
    return $this->belongsTo(Assignature::class);
  }
  
  public function notes() {
    return $this->hasMany(Note::class);
  }
}
