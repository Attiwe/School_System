<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fees extends Model
{
    use HasFactory;
    protected $fillable = ['grade_id','class_id','title','amount','desc','year'];

    public function grade(){
        return $this->belongsTo(Grade::class,'grade_id');
    }
    public function class(){
        return $this->belongsTo(ClassRoms::class,'class_id');
    }
}
