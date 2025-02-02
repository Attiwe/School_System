<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FundAccount extends Model
{
    protected $fillable = ['receipt_id','date','debit','desc','credit'];

}
