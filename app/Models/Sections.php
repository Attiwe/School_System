<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sections extends Model
{
    use HasFactory;
    protected $fillable = ['grade_id', 'class_id', 'nameSectian', 'statuse', 'desc'];
    
     public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'teacher_section', 'section_id', 'teacher_id');
    }
    
     public function appointments()
    {
        return $this->belongsToMany(Appointments::class, 'appointment_section', 'section_id', 'appointment_id');
    }
    
     public function classRom()
    {
        return $this->belongsTo(ClassRoms::class, 'class_id');
    }
}
