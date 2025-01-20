<?php
namespace App\Repositories;

use App\Models\Grade;
use App\Models\Promotion;
use App\Models\Student;
use DB;
 


class PromotionStudentRepository implements PromotionStudentRepositoriesInterface{

    public function getAllPromotion(){
        $Grades = Grade::all();
        return view('pages.promotions.promotions',compact('Grades'));
    }
    public function storagPromotion($request)
    {

    //    dd($request->all());
        DB::beginTransaction();

        try {
            $students = Student::query()
            ->where('grade_id', $request->grade_id)
            ->where('class_id', $request->class_id)
            ->where('section_id', $request->section_id)
            ->where('academic_year',$request->academic_year)
            ->get();

            if ($students->isEmpty()) {
                toastr()->error('لا يوجد طلابه' );
                return redirect()->back();
            }
            

        foreach ($students as $student) {
            Student::updateOrCreate(
                ['id' => $student->id],
                [
                    'grade_id' => $request->new_grade_id,
                    'class_id' => $request->new_class_id,
                    'section_id' => $request->new_section_id,
                    'academic_year'=>$request->new_academic_year,
                ]
            );

           
            Promotion ::updateOrCreate([
            'student_id' => $student->id ,
            'from_grade' => $request->grade_id ,
            'from_class' => $request->class_id ,
            'from_sectian' => $request->section_id ,
            'to_grade' => $request->new_grade_id ,
            'to_class' => $request->new_class_id ,
            'to_sectian' => $request->new_section_id ,
            'new_academic_year' => $request->new_academic_year ,
            'academic_year' => $request->academic_year ,
            ]);
            
        }
        DB::commit();
        return redirect()->route('student.show');
        
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
        
 
    }
    public function createPromotion(){
        $promotions = Promotion::query()->latest()->get();
        
        return view('pages.promotions.mangment_promotions',compact('promotions'));
    }
}