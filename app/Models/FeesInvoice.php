<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeesInvoice extends Model
{
    protected $fillable = ['student_id','grade_id','class_id','fees_id','invoice_date','amount','desc'];

public function student(){
    return $this->belongsTo(Student::class,'student_id');
}
public function grade(){
    return $this->belongsTo(Grade::class,'grade_id');
}
public function class(){
    return $this->belongsTo(ClassRoms::class,'class_id');
}
public function fees(){
    return $this->belongsTo(Fees::class,'fees_id');
}

}
 