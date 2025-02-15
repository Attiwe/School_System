<?php
namespace App\Repositories;

use App\Models\Grade;
use App\Models\Library;
use Storage;

class LibraryRepository implements LibraryRepositoryInterface
{

    public function index()
    {
        $librarys = Library::select('grade_id', 'class_id', 'section_id', 'teacher_id', 'nameBook', 'file_name')->get();
        return view('pages.library.index_library', compact('librarys'));
    }
    public function create()
    {

        $Grades = Grade::select('name', 'id')->get();
        return view('pages.library.create_library', compact('Grades'));
    }
    public function store($request)
    {

        try {
            if ($request->hasfile('file_name')) {
                $files = $request->file('file_name');
                if (is_array($files) && count($files) > 5) {
                    toastr()->error('لا يمكن رفع أكثر من  5 صور.');
                    return redirect()->back();
                }
            }

            foreach ($files as $file) {
                $nameFile = time() . $file->getClientOriginalName();
                $fileName[] = $file->storeAs('/attachments/library/', $nameFile, $disks = 'library');
            }

            if (strlen(json_encode($fileName)) > 255) {
                toastr()->error('عدد الاحرف تعد 255');
                return redirect()->back();
            }

            Library::create([
                'nameBook' => $request->nameBook,
                'grade_id' => $request->grade_id,
                'class_id' => $request->class_id,
                'section_id' => $request->section_id,
                'file_name' => json_encode($fileName),
            ]);

            toastr()->success('تم رفع الملفات بنجاح.');

            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }

    }
    public function download($file_name)
    {
        try {
            // استخراج اسم الملف فقط (لتجنب الأخطاء عند استلام المسار الكامل)
            $file_name = basename($file_name);

            if (!Storage::disk('library')->exists("attachments/library/{$file_name}")) {
                toastr()->error('الملف غير موجود.');
                return redirect()->back();
            }

            return Storage::disk('library')->download("attachments/library/{$file_name}");

        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }



}