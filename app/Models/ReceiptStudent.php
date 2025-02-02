<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReceiptStudent extends Model
{
    protected $fillable = ['student_id','date','debit','desc'];

    public function student(){
        return $this->belongsTo(Student::class,'student_id');
    }
}
