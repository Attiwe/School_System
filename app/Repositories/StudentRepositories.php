<?php
namespace App\Repositories;

use App\Models\ClassRoms;
use App\Models\Grade;
use Illuminate\Support\Facades\DB;
use App\Models\MyParents;
use App\Models\Nationalities;
use App\Models\Sections;
use App\Models\Student;
use App\Models\TypeBloods;
use App\Models\Image;
use Storage;

class StudentRepositories implements StudentRepositoryInterface
{
    public $catchError;
    public function showStudent()
    {
        $students = Student::query()->latest()->get();
        return view('pages.students.index_student', compact('students'));
    }
    public function createStudent()
    {
        $data['nationalities'] = Nationalities::all();
        $data['bloods'] = TypeBloods::all();
        $data['Grades'] = Grade::all();
        $data['parents'] = MyParents::all();
        return view('pages.students.create_student', $data);
    }

    public function storeStudent($request)
    {
        //  dd($request->all());
        DB::beginTransaction();
        try {
            $request->validated();

            $student = new Student();
            $student->name = $request->name;
            $student->email = $request->email;
            $student->password = $request->password;
            $student->academic_year = $request->academic_year;
            $student->date_birth = $request->date_birth;
            $student->nationalitie_id = $request->nationalitie_id;
            $student->gender = $request->gender;
            $student->blood_id = $request->blood_id;
            $student->grade_id = $request->grade_id;
            $student->class_id = $request->class_id;
            $student->section_id = $request->section_id;
            $student->parents_id = $request->parents_id;
            $student->save();


            if ($request->hasfile('photos')) {
                if (count($request->photos) > 5) {
                    toastr()->message('لا يمكن رفع أكثر من  5 صور.');

                    return redirect()->back();
                }
                foreach ($request->file('photos') as $file) {

                    $fileName = $file->getClientOriginalName();
                    $file->storeAs('attachments/students/' . $request->name, $file->getClientOriginalName(), $disks = 'student_Attachments');

                    $student->images()->create([
                        'fileName' => $fileName,
                        'imageable_id' => $student->id
                    ]);
                }
            }
            DB::commit();
            // toastr()->success('تمت إضافة الطالب ' . $student->name . ' بنجاح', ['positionClass' => 'toast-top-left']);

            return redirect()->route('student.show');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->catchError = $e->getMessage();
        }
    }

    public function editStudent($id)
    {
        try {
            $data['students'] = Student::where('id', $id)->get();
            $data['nationalities'] = Nationalities::all();
            $data['bloods'] = TypeBloods::all();
            $data['Grades'] = Grade::all();
            $data['parents'] = MyParents::all();
            return view('pages.students.edit_student', $data);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'حدث خطأ أثناء تحميل بيانات الطالب: ' . $e->getMessage()]);
        }
    }

    public function updateStudent($request)
    {
        //   dd($request->all());
        try {
            $student = Student::findOrFail($request->id);
            $data = $request->only(['name', 'email', 'academic_year', 'date_birth', 'nationalitie_id', 'gender', 'blood_id', 'grade_id', 'class_id', 'section_id', 'parents_id']);
            $student->update($data);
            // toastr()->success('تمت الاضافه', ['positionClass' => 'toast-top-left']);
            return redirect()->route('student.show');

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'حدث خطأ أثناء تحميل بيانات الطالب: ' . $e->getMessage()]);
        }
    }

    public function show_Student($id)
    {

        $student = Student::findOrFail(id: $id);

        return view('pages.students.show_student', compact('student'));
    }

    public function uploadeAttachment($request)
    {

        try {
            if ($request->hasfile('photos')) {
                if (count($request->photos) > 5) {
                    toastr()->message('لا يمكن رفع أكثر من 5 صور.');
                    return redirect()->back();
                }
                foreach ($request->file('photos') as $file) {

                    $fileName = $file->getClientOriginalName();
                    $file->storeAs(
                        'attachments/students/' . $request->name,
                        $file->getClientOriginalName(),
                        $disks = 'student_Attachments'
                    );
                    Image::create([
                        'fileName' => $fileName,
                        'imageable_type' => 'App\Models\Student',
                        'imageable_id' => $request->student_id,
                    ]);
                }

                toastr()->success('تمت إضافة الطالب ' . $request->name . ' بنجاح', ['positionClass' => 'toast-top-left']);
                return redirect()->back();
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'حدث خطأ أثناء تحميل بيانات الطالب: ' . $e->getMessage()]);

        }

    }

    public function deleteStudent($id)
    {
        try {
            if ($id) {
                Student::where('id', $id)->delete();
                return redirect()->route('student.show');
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    public function deleteAttachmentStudent($request)
    {
        // dd($request->all());
        Storage::disk('student_Attachments')->delete('attachments/students/' . $request->student_name . '/' . $request->fileName);
        Image::where('id', $request->id)->where('fileName', $request->fileName)->delete();
        return redirect()->back();
    }

    public function getClassRome($grade_id)
    {
        return ClassRoms::where('grade_id', $grade_id)->pluck('nameClass', 'id');

    }
    public function getSection($class_id)
    {
        return Sections::where('class_id', $class_id)->pluck('nameSectian', 'id');

    }
}