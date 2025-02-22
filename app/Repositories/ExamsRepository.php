<?php
namespace App\Repositories;

use App\Models\Exams;

class ExamsRepository implements ExamsRepositoryInterface
{

    public function index()
    {
        $exams = Exams::select('nameExams','term','acadamic_year','id')->latest()->get();
        return view('pages.exams.index_exams', compact('exams'));
    }
    public function create()
    {
        return view('pages.exams.create_exams');
    }
    public function store($request)
    {
        try {
            Exams::create([
                'nameExams' => $request->nameExams,
                'term' => $request->term,
                'acadamic_year' => $request->academic_year,
            ]);
            toastr()->success('تم الحفظ ' . $request->nameExams);
            return redirect()->route('exams.index');
        } catch (\Throwable $th) {

        }
    }
    public function edit($request)
    {
        $exams = Exams::findOrFail($request->edit);
        return view('pages.exams.edit_exams', compact('exams'));

    }
    public function update($request)
    {
        try {

            $exams = Exams::findOrFail($request->id);

            $exams ->update([
                'nameExams' => $request->nameExams,
                'term' => $request->term,
                'acadamic_year' => $request->academic_year,
            ]);
            toastr()->success('تم التعديل ' . $request->nameExams);
            return redirect()->route('exams.index');
        } catch (\Throwable $th) {

        }
    }
    public function destroy($request)
    {
        try {
            $exams = Exams::findOrFail($request->id);
            $exams->delete();
            toastr()->error(' تم الخذف ');
            return redirect()->back();

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

}