<?php
namespace App\Repositories;

use App\Models\AttendenceStudent;
use App\Models\Grade;
use App\Models\Student;

class AttendenceStudentRepository implements AttendenceStudentRepositoryInterface
{
    public function index()
    {
        $grades = Grade::with('sections')->get();
        return view('pages.attendenceStudent.section_attendenceStudent', compact('grades'));
    }
   
    public function showAttendenceStudent()
    {
        $attenceOle = AttendenceStudent::select('student_id','grade_id','class_id','attendence_date','attendence')->get();
         
        return view('pages.attendenceStudent.show_attendence_absent', compact('attenceOle'));
    }

    public function show($request)
    {
        $students = Student::with('attendece')
            ->select('id', 'name', 'grade_id', 'class_id', 'section_id', 'academic_year')
            ->where([
                ['grade_id', '=', $request->id],
                ['class_id', '=', $request->class_id],
                ['section_id', '=', $request->section_id]
            ])
            ->latest('id')
            ->get();

        if ($students->isNotEmpty()) {
            return view('pages.attendenceStudent.index_attendenceStudent', compact('students'));
        }
        toastr()->error('لا يوجد طلاب');
        return redirect()->back();
    }


    public function store($request)
    {

        // dd($request->all());

        try {

            $attendenceData = collect($request->attendences)->map(function ($attendence, $studentId) use ($request) {
                return [
                    'student_id' => $studentId,
                    'grade_id' => $request->grade_id,
                    'class_id' => $request->class_id,
                    'section_id' => $request->section_id,
                    'attendence_date' => date('Y-m-d'),
                    'attendence' => $attendence == "presence",
                ];
            })->toArray();
            AttendenceStudent::insert($attendenceData);
            toastr()->success('تم إضافة الحضور بنجاح.');
            return redirect()->route('attendence.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'حدث خطأ أثناء الحفظ: ' . $e->getMessage()]);
        }

    }

    public function edit($request)
    {

    }
    public function update($request)
    {

    }
    public function destroy($request)
    {

    }
}