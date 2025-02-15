<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    protected $fillable = ['grade_id','class_id','section_id','teacher_id','nameBook','file_name'];
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
}
