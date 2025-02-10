<?php
namespace App\Repositories;

use App\Models\Grade;
use App\Models\Teacher;

class SubjectStudentRepository implements SubjectStudentRepositoryInterface
{
    public function index()
    {
        return view('pages.subjectStudent.index_subjectStudent');
    }
    public function create()
    {
        $Grades = Grade::select('name', 'id')->get();
        $teacher = Teacher::select('name','id')->get();
        return view('pages.subjectStudent.create_subjectStudent', compact(['Grades', 'teacher']));
    }

    public function store($request){
       
        $

    }
}