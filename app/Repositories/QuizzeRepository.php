<?php
namespace App\Repositories;

use App\Models\Grade;
use App\Models\Quizze;
use App\Models\SubjectStudent;
use App\Models\Teacher;

class QuizzeRepository implements QuizzeRepositoryInterface
{


    public function index()
    {
         $quizzes = Quizze::latest()->get();
        return view('pages.quizzes.index_quizzet',compact('quizzes'));
    }
    public function create()
    {
        $data['Grades']  = Grade::select('name', 'id')->get();
        $data['teacher'] = Teacher::select('name', 'id')->get();
        $data['subject'] = SubjectStudent::select('nameSubject','id')->get();

        return view('pages.quizzes.create_quizzet', $data);
    }
    public function store($request)
    {
         try {
            Quizze::create([
                'nameQuizze' => $request->nameQuizze,
                'grade_id' => $request->grade_id,
                'class_id' => $request->class_id,
                'section_id' => $request->section_id,
                'subject_id' => $request->subject_id,
                'teacher_id' => $request->teacher_id,
            ]);
            toastr()->success('تم الحفظ ' . $request->nameExams);
            return redirect()->route('quizze.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function edit($request)
    {
         $data['quizze'] = Quizze::findOrFail($request->edit);
         $data['Grades']  = Grade::select('name', 'id')->get();
         $data['teacher'] = Teacher::select('name', 'id')->get();
         $data['subject'] = SubjectStudent::select('nameSubject','id')->get();
         return view('pages.quizzes.edit_quizze', $data );
    }
    public function update($request)
    {

        //  return $request;
        try {

            $quizze = Quizze::findOrFail($request->id);

            $quizze ->update([
                'nameQuizze' => $request->nameQuizze,
                'grade_id' => $request->grade_id,
                'class_id' => $request->class_id,
                'section_id' => $request->section_id,
                'subject_id' => $request->subject_id,
                'teacher_id' => $request->teacher_id,
            ]);
            toastr()->success('تم التعديل ' . $request->nameQuizze);
            return redirect()->route('quizze.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }
    }
    public function destroy($request)
    {
        try {
            $quizze = Quizze::findOrFail($request->id);
            $quizze->delete();
            toastr()->error(' تم الخذف ');
            return redirect()->back();

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}