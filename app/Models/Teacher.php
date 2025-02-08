<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
     use HasFactory;
     protected $fillable = ['name', 'email', 'password', 'specialization_id', 'gender', 'joining_Date', 'address', 'phone'];
     public function specialization()
     {
          return $this->belongsTo(Specialization::class, 'specialization_id');
     }
     public function sections()
     {
          return $this->belongsToMany(Sections::class, 'teacher_section', 'section_id');
     }
}
