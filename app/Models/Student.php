<?php

namespace App\Models;

 use Illuminate\Database\Eloquent\Factories\HasFactory;
 use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student  extends Authenticatable
{
     use SoftDeletes;
     use HasFactory;
     protected $fillable = ['grade_id','class_id','section_id','nationalitie_id','blood_id','parents_id' ,'email','gender','date_birth','academic_year','name','password'];

     public function images(): MorphMany
     {
         return $this->morphMany( Image::class, 'imageable');
     }
     
     public function gradeStudent(){
          return $this->belongsTo(Grade::class,'grade_id');
     }
     public function classStudent(){
          return $this->belongsTo(ClassRoms::class,'class_id');
     }
     public function sectionStudent(){
          return $this->belongsTo(Sections::class,'section_id');
     }
     public function nationalitieStudent(){
          return $this->belongsTo(Nationalities::class,'nationalitie_id');
     }
     public function bloodStudent(){
          return $this->belongsTo(TypeBloods::class,'blood_id');
     }
     public function parentsStudent(){
          return $this->belongsTo( MyParents::class,'parents_id');
     }
     public function student_account()
     {
         return $this->hasMany(StudentAccount::class,'student_id');
     }
     
     public function attendece()
     {
         return $this->hasMany(AttendenceStudent::class ,'student_id');
     }
     
     
     
      
}
