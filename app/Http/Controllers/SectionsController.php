<?php

namespace App\Http\Controllers;

use App\Models\Appointments;
use App\Models\ClassRoms;
use App\Models\Grade;
use App\Models\Sections;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Requests\SectainValidate;

class SectionsController extends Controller
{
    
    public function index()
    {
        $Grades = Grade::with('sections')->get();
        $teachers = Teacher::all();
        $appointments = Appointments::all();
        return view('pages.sections.sectian', compact('Grades', 'teachers', 'appointments'));
    }

    public function store(Request $request)
    {
        //   dd($request->all());

        try {
            $data = $request->only(['nameSectian', 'statuse', 'grade_id', 'class_id', 'desc']);
            $section = Sections::create($data);
            $section->appointments()->attach($request->appointment_id);
            $section->teachers()->attach($request->teacher_id);
            toastr()->success('تمت الاضافة');
            return redirect()->route('section.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }




    public function getClasses($id)
    {
        try {
            $list_classes = ClassRoms::where('Grade_id', $id)->pluck('nameClass', 'id');
            return $list_classes;
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    public function update(SectainValidate $request)
    {
        //    dd($request->id);
        try {
            $request->validated();

            $section = Sections::findOrFail($request->id);
            $data = $request->only(['nameSectian', 'statuse', 'grade_id', 'class_id', 'desc']);
            $section->update($data);
    
            $section->teachers()->sync($request->teacher_id);
            $section->appointments()->sync($request->appointment_id);
    
            toastr()->success('تم التحديث');
            return redirect()->back();

        }catch (\Exception $e) {
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
        }
         
    }

    public function destroy(Request $request)
    {
        // dd( $request ->all());
        try {
             $section = Sections::findOrFail($request->id);
             $section->delete();  
    
            toastr()->error('تم المسح');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    
 
}
