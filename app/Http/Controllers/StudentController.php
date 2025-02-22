<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;

use App\Repositories\StudentRepositoryInterface;
use Illuminate\Http\Request;

class StudentController extends Controller
{
     private $Student;

     public function __construct(StudentRepositoryInterface $student)
     {
          $this->Student = $student;
     }


     public function dashboard()
     {
          return view('pages.students.dashboard_student');
     }

     
     public function index()
     {
          return $this->Student->createStudent();
     }
     public function store(StudentRequest $request)
     {
          return $this->Student->storeStudent($request);
     }
     public function show()
     {
          return $this->Student->showStudent();
     }

     public function edit($id)
     {
          return $this->Student->editStudent($id);
     }
     public function update( Request $request)
     {
           return $this->Student->updateStudent($request);
     }
     public function show_student($id)
     {
          return $this->Student->show_Student($id);
     }

     public function uploadeAttachment(Request $request)
     {
          return $this->Student->uploadeAttachment($request);
     }

     public function dowenLoadeAttachment($studentname, $filename)
     {
          return response()->download(storage_path('attachments/students/' . $studentname . '/' . $filename));
     }

     public function destroyAttachment(Request $request)
     {
           return $this->Student->deleteAttachmentStudent($request);
     }
 
     public function destroy($id)
     {
          return $this->Student->deleteStudent($id);
     }

     public function getClass($grade_id)
     {
          return $this->Student->getClassRome($grade_id);
     }

     public function getSection($class_id)
     {
          return $this->Student->getSection($class_id);

     }


}

