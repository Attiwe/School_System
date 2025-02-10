<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubjectStudent extends Model
{
    protected $fillable = ['teacher_id','grade_id','class_id','nameSubject'];
}
