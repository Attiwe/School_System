<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class MyParents   extends Authenticatable
{
   use HasFactory;
 protected $fillable = [
    'email', 'email_mather', 'national_id_father', 'national_id_mother',
    'passport_id_father', 'passport_id_mother', 'phone_father', 'phone_mother',
    'name_father', 'name_mother', 'job_father', 'job_mother', 'address_father', 'address_mother',
    'blood_type_father_id', 'blood_type_mother_id', 'nationality_father_id', 'nationality_mother_id',
    'religion_father_id', 'religion_mother_id', 'password',
];

public function parentAttact(){
   return $this->hasOne(ParentAttachment::class,'parent_id');
}

public function religion(){
    return $this->belongsTo(Religion::class,'religion_father_id');
 }
 public function type_blood(){
    return $this->belongsTo(TypeBloods::class,'blood_type_father_id');
 }
 public function nationality(){
    return $this->belongsTo(Nationalities::class,'nationality_father_id');
 }


 public function religion_mather(){
    return $this->belongsTo(Religion::class,'religion_mother_id');
 }
 public function type_blood_mather(){
    return $this->belongsTo(TypeBloods::class,'blood_type_mother_id');
 }
 public function nationality_mather(){
    return $this->belongsTo(Nationalities::class,'nationality_mother_id');
 }



}
