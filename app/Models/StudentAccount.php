<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentAccount extends Model
{
    protected $fillable = ['student_id','grade_id','class_id','debit','credit','desc','fees_invoices_id','receipt_id'];

}
