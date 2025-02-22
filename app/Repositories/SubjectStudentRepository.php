<?php
namespace App\Repositories;

use App\Models\Grade;
use App\Models\SubjectStudent;
use App\Models\Teacher;

class SubjectStudentRepository implements SubjectStudentRepositoryInterface
{
    public function index()
    {
        $subjects = SubjectStudent::select('id','teacher_id','grade_id','class_id','nameSubject')->latest()->get();
        return view('pages.subjectStudent.index_subjectStudent', compact('subjects'));
    }
    public function create()
    {
        $Grades = Grade::select('name', 'id')->get();
        $teacher = Teacher::select('name', 'id')->get();
        return view('pages.subjectStudent.create_subjectStudent', compact(['Grades', 'teacher']));
    }
    public function store($request)
    {
        try {

            $subjectStudent = new SubjectStudent();
            $subjectStudent->nameSubject = $request->nameSubject;
            $subjectStudent->grade_id = $request->grade_id;
            $subjectStudent->class_id = $request->class_id;
            $subjectStudent->teacher_id = $request->teacher_id;
            $subjectStudent->save();

            toastr()->success('تم اضافه المواد');
            return redirect()->route('subjectStudent.index');

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function edit($request)
    {
        $subject = SubjectStudent::findOrFail($request->edit);
        $Grades = Grade::select('name', 'id')->get();
        $teacher = Teacher::select('name', 'id')->get();
        return view('pages.subjectStudent.edit_subjectStudent',compact( ['Grades', 'teacher','subject']));
    }
    public function update($request)
    {
            try {

            $subjectStudent =   SubjectStudent::findOrFail($request->id);
            $subjectStudent->nameSubject = $request->nameSubject;
            $subjectStudent->grade_id = $request->grade_id;
            $subjectStudent->class_id = $request->class_id;
            $subjectStudent->teacher_id = $request->teacher_id;
            $subjectStudent->save();

            toastr()->success('تم تعديل المواد');
            return redirect()->route('subjectStudent.index');

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function destroy($request)
    {

        try {
            $subject = SubjectStudent::findOrFail($request->id);
            $subject->delete();
            toastr()->error(' تم الخذف ');
            return redirect()->back();

        } catch (\Exception $e) {
            return redirect()->back()->catchError = $e->getMessage();
        }


    }
}