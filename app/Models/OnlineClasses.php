<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OnlineClasses extends Model
{
    protected $fillable = ['grade_id','class_id','section_id','user_id','meting_id','topic','start_at','duration','password','start_url','join_url'];

    public function grade(){
        return $this->belongsTo(Grade::class,'grade_id');
    }
    public function class(){
        return $this->belongsTo(ClassRoms::class,'class_id');
    }
    public function section(){  
        return $this->belongsTo(Sections::class,'section_id');
    }
    public function user(){
        return $this->belongsTo(USer::class,'user_id');
    }
}
