<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttendenceStudent extends Model
{
    protected $fillable = ['student_id','grade_id','class_id','section_id','teacher_id','attendence_date','attendence'] ;

    public function student (){
        return $this->belongsTo(Student::class,'student_id');
    }
    public function grade (){
        return $this->belongsTo(Grade::class,'grade_id');
    }
    public function class (){
        return $this->belongsTo(ClassRoms::class,'class_id');
    }
}
