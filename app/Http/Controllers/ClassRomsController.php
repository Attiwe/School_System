<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClassRomeValidate;
use App\Models\ClassRoms;
use App\Models\Grade;
use Illuminate\Http\Request;

class ClassRomsController extends Controller
{
    public function index()
    {
        $class = ClassRoms::all();
        $grades = Grade::pluck('name', 'id');
        return view('pages.classRomes.classRome', compact('class', 'grades'));
    }

    public function store(ClassRomeValidate $request)
    {
        $request->validated();
        try {
            ClassRoms::create([
                'nameClass' => $request->nameClass,
                'grade_id' => $request->grade_id,
            ]);
            toastr()->success('تم اضافه الفصل بنجاح');
            return redirect()->route('class.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    public function update(ClassRomeValidate $request)
    {
        // dd($request->all());
        $request->validated();
        try {
            $classRome = ClassRoms::findOrFail($request->id);
            if ($classRome) {
                $classRome->update([
                    'nameClass' => $request->nameClass,
                    'grade_id' => $request->grade_id,

                ]);
            }
            toastr()->success('تم اضافه الفصل بنجاح');
            return redirect()->route('class.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function destroy(Request $request)
    {
        try {
            ClassRoms::where('id', $request->id)->delete();
            toastr()->error('تم المسح');
            return redirect()->route('class.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }
 public function destroy_all(Request $request)
{
    try {
        $deleteAll = explode(",", $request->selected_id);
        ClassRoms::whereIn('id',$deleteAll)->delete();
        toastr()->error('تم المسح');
      return redirect()->route('class.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
        }
      
}
public function filter_class(Request $request){
    
    $grades = Grade::all();
    $search = ClassRoms::where('grade_id', $request->grade_id)->get();
        return redirect()->route('class.index')->with('details', $search);
}

}
