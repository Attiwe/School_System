<?php

namespace App\Http\Controllers;

use App\Models\SubjectStudent;
use App\Repositories\SubjectStudentRepositoryInterface;
use Illuminate\Http\Request;

class SubjectStudentController extends Controller
{
    private $SubjectStudent;

    public function __construct(SubjectStudentRepositoryInterface $subjectStudent)
    {
         $this->SubjectStudent = $subjectStudent;
    }
    public function index()
    {
         return $this->SubjectStudent->index();
    }

    public function create()
    {
         return $this->SubjectStudent->create();
    }    
    public function store(Request $request)
    {
        return $this->SubjectStudent->store($request);
    }

    public function edit(Request $request)
    {
        return $this->SubjectStudent->edit($request);
    }
    public function update(Request $request )
    {
         return $this->SubjectStudent->update($request);
    }
     public function destroy(Request $request)
    {
        return $this->SubjectStudent->destroy($request);
    }
}
