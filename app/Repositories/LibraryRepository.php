<?php
namespace App\Repositories;

use App\Models\Grade;
use App\Models\Library;
use Flasher\Prime\EventDispatcher\EventListener\AddToStorageListener;
use Storage;

class LibraryRepository implements LibraryRepositoryInterface
{

    public function index()
    {
        $librarys = Library::select('grade_id', 'class_id', 'section_id', 'teacher_id', 'nameBook', 'file_name','id')->paginate(10);
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
                if (is_array($files) && count($files) > 2) {
                    toastr()->error('لا يمكن رفع أكثر من  2 صور.');
                    return redirect()->back();
                }
            }

            foreach ($files as $file) {
                $nameFile = time() . $file->getClientOriginalName();
                $fileName[] = $file->storeAs('/attachments_library/library/', $nameFile, $disks = 'library');
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

    public function edit($request){

        $library = Library::with(['grade','class','section'])->firstwhere('id',$request->edit) ;
         $Grades = Grade::select('name', 'id')->get();

        return view('pages.library.edit_library', compact('library','Grades'));

    }

    public function download($file_name)
    {
        try {
            // استخراج اسم الملف فقط (لتجنب الأخطاء عند استلام المسار الكامل)
            $file_name = basename($file_name);

            if (!Storage::disk('library')->exists("attachments_library/library/{$file_name}")) {
                toastr()->error('الملف غير موجود.');
                return redirect()->back();
            }

            return Storage::disk('library')->download("attachments_library/library/{$file_name}");

        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public function destroy($request)
    {
        try {
             $fileRecord = Library::findOrFail($request->id);
    
             $files = json_decode($fileRecord->file_name, true);
    
            if (!empty($files) && is_array($files)) {
                foreach ($files as $file) {
                     if (Storage::disk('library')->exists($file)) {
                        Storage::disk('library')->delete($file);
                    }
                }
            }
    
             $fileRecord->delete();
    
            toastr()->success('تم الحذف بنجاح.');
        } catch (\Exception $e) {
            toastr()->error('حدث خطأ أثناء الحذف: ' . $e->getMessage());
        }
    
        return redirect()->back();
    }

    public function update($request){
        
        
        try {
            

           $library = Library::findOrFail($request->id);
           $library->update([
                'nameBook' => $request->nameBook,
                'grade_id' => $request->grade_id,
                'class_id' => $request->class_id,
                'section_id' => $request->section_id,
             ]);

            toastr()->success('تم رفع الملفات بنجاح.');

            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }

    }

    
    
}