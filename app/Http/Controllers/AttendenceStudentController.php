<?php

namespace App\Http\Controllers;

use App\Models\AttendenceStudent;
use App\Repositories\AttendenceStudentRepositoryInterface;
use Illuminate\Http\Request;

class AttendenceStudentController extends Controller
{
    private $Attendence;
    public function __construct( AttendenceStudentRepositoryInterface $attendenceStudent ){
        $this->Attendence=$attendenceStudent;
    }
   
    public function index()
    {
         return $this->Attendence->index();
    }

    
    public function store(Request $request)
    {
        return $this->Attendence->store($request);
    }
 
    public function show( Request $request)
    {
        return $this->Attendence->show($request);
    }

    public function ShowAttendenceStudent()
    {
        return $this->Attendence->showAttendenceStudent();
    }
    
    

    
   
}
