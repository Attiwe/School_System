<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model; 
 
class Quizze extends Model
{
    protected $fillable = ['teacher_id','grade_id','class_id','subject_id','section_id','nameQuizze'];

    public function teacher(){
        return $this->belongsTo(Teacher::class,'teacher_id');
    }
    public function grade(){
        return $this->belongsTo(Grade::class,'grade_id');
    }
    public function class(){
        return $this->belongsTo(ClassRoms::class,'class_id');
    }
    public function section(){
        return $this->belongsTo(Sections::class,'section_id');
    }
    public function subject(){
        return $this->belongsTo(SubjectStudent::class,'subject_id');
    }
}
