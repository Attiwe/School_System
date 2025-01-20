<?php

namespace App\Http\Controllers;

use App\Http\Requests\gradesValidate;
use App\Models\ClassRoms;
use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
     
    public $skipValidation = false;
    public function index()
    {
        try {
            $grades = Grade::all();
            return view('pages.grades.grade', compact('grades'));
        } catch (\Throwable $th) {
            return view('incorrect.404');
        }

    }


    public function store(gradesValidate $grade)
    {

        $validated = $grade->validated();
        try {
            $grade = Grade::create([
                'name' => $grade->name,
                'notes' => $grade->notes,
            ]);
            // toastr()->success('تم اضافه المرحله بنجاح');
            return redirect()->route('page.index');

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function update( Request $request)
    {
        // dd($grade->id);
         try {
            $Grade = Grade::findOrFail($request->id);
            if ($Grade) {
                $Grade->update([
                    'name' => $request->name,
                    'notes' => $request->notes,
                ]);

                toastr()->success('تم التعديل الفصل بنجاح');

                return redirect()->route('page.index');
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
 
    public function destroy(Request $request)
    {
        try {
            $Grade = Grade::findOrFail($request->id);
            $classRome = ClassRoms::where('grade_id', $Grade->id)->exists();
            if ($classRome) {
                toastr()->error('لم تتم عملية المسح بسبب ارتباط العنصر بجدول آخر');
                return redirect()->back();
            } else {
                $Grade->delete();
                toastr()->success('تمت عملية المسح بنجاح');
                return redirect()->back();
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }
}
