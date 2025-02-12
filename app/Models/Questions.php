<?php

namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    protected $fillable = ['quizze_id','title','answer','right_answer','score'];

    public function quizze()
{
    return $this->belongsTo(Quizze::class, 'quizze_id');
}

}
