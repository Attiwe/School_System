<?php

namespace App\Repositories;

use App\Models\Specialization;
use App\Models\Teacher;
use Hash;


class TeacherRepository implements TeacherRepositoryInterface
{

   public function getAllTeachers()
   {
      return Teacher::query()->latest()->with('specialization')->get();

   }
   public function getAllSpecialization()
   {
      return Specialization::all();
   }
   public function StoreTeachers($request)
   {
      $data = $request->validated();
      try {
         $data['password'] = Hash::make('password');
         $data['specialization_id'] = $data['Specialization_id'];
         $data['joining_Date'] = $data['joining_date'];
         $data['gender'] = $data['Gender'];
         Teacher::create($data);
            toastr()->success('تمت الاضافه');
         return redirect()->route('teacher.index');
      } catch (\Exception $e) {
         return redirect()->back()->withErrors(['error' => $e->getMessage()]);
      }

   }

   public function EditTeacher($id)
   {
      $teachers = Teacher::where('id', $id)->get();
      $specializations = Specialization::all();
      return view('pages.teachers.edit_teacher', compact('teachers', 'specializations'));
   }

   public function UpdateTeacher($request)
   {

      try {
         $teacher = Teacher::findOrFail($request->id);
         $data = $request->only(['name', 'email', 'phone', 'joining_date', 'Specialization_id', 'Gender', 'address']);

         if ($request->has('password') && $request->password) {
            $data['password'] = bcrypt($request->password);
         }
         $data['specialization_id'] = $data['Specialization_id'];
         $data['joining_Date'] = $data['joining_date'];
         $data['gender'] = $data['Gender'];
         $teacher->update($data);
          toastr()->success('تمت التعديل');
         return redirect()->route('teacher.index');
      } catch (\Exception $e) {
         return redirect()->back()->withErrors(['error' => $e->getMessage()]);
      }


   }


   public function DeleteTeacher($id)
   {

      $teacher = Teacher::findOrFail($id);
      if ($teacher) {
         $teacher->delete();
          toastr()->success(' تم المسح ');
         return redirect()->route('teacher.index');
      } else {
         toastr()->error('  غير موجود ');
         return redirect()->route('teacher.index');
      }
   }
}