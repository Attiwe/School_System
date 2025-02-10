<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubjectStudent extends Model
{
    protected $fillable = ['teacher_id','grade_id','class_id','nameSubject'];
   
    public function grade(){
        return $this->belongsTo(Grade::class,'grade_id');
    }
    public function class(){
        return $this->belongsTo(ClassRoms::class,'class_id');
    }
    public function teacher(){
        return $this->belongsTo(Teacher::class,'teacher_id');
    }
    
    
}
