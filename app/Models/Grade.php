<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $fillable = ['name','notes'] ;
 
    public function sections()
{
    return $this->hasMany(Sections::class, 'grade_id');
}

}
