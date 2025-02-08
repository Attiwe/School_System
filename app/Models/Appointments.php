<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
    use HasFactory;
    protected $fillable=['name','email','phone','specialization_id','joining_Date','address'];
    public function specialization(){
        return $this->belongsTo(Specialization::class,'specialization_id');
    }
    public function sections() 
     {
         return $this->belongsToMany(Sections::class,'appointment_section','section_id');
     }
}
