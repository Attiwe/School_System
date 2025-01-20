<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassRoms extends Model
{
    protected $fillable =['nameClass','grade_id'];

    
    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id');  
    }
    public function section(){
        return $this->hasMany(Sections::class,'grade_id');
    }
}
