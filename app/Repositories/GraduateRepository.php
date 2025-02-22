<?php
namespace App\Repositories;

use App\Models\Grade;
use App\Models\Student;
use App\Repositories\GraduateRepositoryInterface;

class GraduateRepository implements GraduateRepositoryInterface
{

    public function getStudentGraduate()
    {
        $Grades = Grade::select('id','name','notes')->get();
        return view('pages.graduates.graduate_student', compact('Grades'));
    }
    public function sofetDelete($request)
    {
        try {
        
            $students = Student::where('grade_id', $request->grade_id)
            ->where('class_id', $request->class_id)
            ->where('academic_year', $request->academic_year)
            ->get();
        if ($students->isEmpty()) {
            toastr()->error('لايوجد طلاب');
            return redirect()->back();
        }
        $students->each(function ($student) {
            $student->Delete();
        });

        return redirect()->route('graduate.create');

    } catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => 'حدث خطأ أثناء تحميل بيانات الطالب: ' . $e->getMessage()]);

        }
    }

    public function showStudnetGradute(){
        $students = Student::onlyTrashed()->get();
        return view('pages.graduates.index_studentGradute',compact('students'));
    }

    public function returnStudentGraduate($request){

        try {
            $student = Student::onlyTrashed()->where('id',$request->id)->first();
            $student->restore(); 
            toastr()->message('تمت  عمليه الرجوع');
            return redirect()->back();
      
         } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'حدث خطأ أثناء تحميل بيانات الطالب: ' . $e->getMessage()]); 
        }   
    }

    public function destroyStudentGraduate($request){

        try {
            $student = Student::onlyTrashed()-> where('id',$request->id)->first();
            $student->forceDelete();
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'حدث خطأ أثناء تحميل بيانات الطالب: ' . $e->getMessage()]); 
        }
    
    }
}