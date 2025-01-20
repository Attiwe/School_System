<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
     protected $fillable = ['student_id','from_grade','from_class','from_sectian','to_grade','to_class','to_sectian','new_academic_year','academic_year'];

     public function student(){
      return $this->belongsTo(Student::class,'student_id');
     }
     public function fromGrade(){
      return $this->belongsTo(Grade::class,'from_grade');
     }
     public function fromClass(){
      return $this->belongsTo(ClassRoms::class,'from_class');
     }
     public function fromSectian(){
      return $this->belongsTo(Sections::class,'from_sectian');
     }
     public function toGrade(){
      return $this->belongsTo(  Grade::class,'to_grade');
     }
     public function toClass(){
      return $this->belongsTo(  ClassRoms::class,'to_class');
     }
     public function toSectian(){
      return $this->belongsTo(  Sections::class,'to_sectian');
     }
      


}
