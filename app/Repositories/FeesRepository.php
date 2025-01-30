<?php

namespace App\Repositories;

use App\Models\Fees;
use App\Models\Grade;
use App\Models\Student;
use App\Repositories\FeesRepositoryInterface;

class FeesRepository implements FeesRepositoryInterface
{

    public function getFees()
    {

        $feess = Fees::query()->latest()->get();
        return view('pages.feess.index_fees', compact('feess'));
    }
    public function createFees()
    {

        $Grades = Grade::select('name', 'id')->get();
        return view('pages.feess.create_fees', compact('Grades'));
    }

    public function storeFees($request)
    {
        try {
            $data = $request->validated();
            Fees::create($data);

            session()->flash('success', 'تم حفظ البيانات بنجاح');

            return redirect()->route('fees.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'حدث خطأ أثناء تحميل بيانات الطالب: ' . $e->getMessage()]);
        }
    }

    public function editFees($request)
    {
        $fees = Fees::where('id', $request->edit)->first();
        $Grades = Grade::select(['name', 'id'])->get();
        return view('pages.feess.edit_fees', compact('fees', 'Grades'));
    }


    public function updateFees($request)
    {
        $request->validated();

        $fees = Fees::findOrFail($request->id);

        $fees->update($request->only('grade_id', 'class_id', 'title', 'amount', 'desc', 'year'));
        session()->flash('success', 'تم حفظ البيانات بنجاح');

        return redirect()->route('fees.index');
    }

    public function showFees($request){

        $feess = Fees::where('id',$request->id)->first();
        $student = Student::where('grade_id',$feess->grade_id)
                         ->where('class_id',$feess->class_id)
                         ->where('academic_year',$feess->year)
                         ->get();
         
        return  view('pages.feess.show_fees',compact(['feess','student'])) ;
    }
    public function destroyFees($request)
    {

        try {
            $fees = Fees::findOrFail($request->id);
            $fees->delete();

            session()->flash('success', 'تم حفظ البيانات بنجاح');
            return redirect()->route('fees.index');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => 'حدث خطأ أثناء تحميل بيانات الطالب: ' . $e->getMessage()]);
        }
    }
 
    
}

