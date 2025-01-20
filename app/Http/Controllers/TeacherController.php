<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherRequest;
use App\Models\Teacher;
use App\Repositories\TeacherRepositoryInterface;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
   public $Teacher;
   public function __construct(TeacherRepositoryInterface $Teacher) {
        $this->Teacher = $Teacher;
    }

    public function index()
    {
       $teachers = $this->Teacher->getAllTeachers();
        return view('pages.teachers.index_teacher',compact('teachers'));
    }
    public function create()
    {
        $specialization = $this->Teacher->getAllSpecialization();
        return view('pages.teachers.create_teacher',compact('specialization'));
    }
    public function store(TeacherRequest $request)
    {
          return $this->Teacher->StoreTeachers($request);
    }
    public function edit($id)
    {
       return $this->Teacher->EditTeacher($id);
     }    
    public function update(Request $request)
    {
      return $this->Teacher->UpdateTeacher($request);
    }
    public function destroy(Request $request)
    {
       return  $this->Teacher->DeleteTeacher($request->id);
    }
}
