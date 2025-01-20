<?php
namespace App\Repositories;

use App\Http\Requests\TeacherRequest;

 
interface TeacherRepositoryInterface{
    //get all teachers
     public function getAllTeachers();
     //get all Specialization
     public function getAllSpecialization();
     //get Store Teachers
     public function StoreTeachers(TeacherRequest $request);
     //get edit teacher
     public function EditTeacher($id);
     //get edit teacher
     public function UpdateTeacher($request);
     public function DeleteTeacher($id);
 }
 