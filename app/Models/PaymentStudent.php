<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentStudent extends Model
{
    protected $fillable = ['student_id','date','amount','desc'];

    public function student(){
        return $this->belongsTo(Student::class,'student_id');
    }
}
