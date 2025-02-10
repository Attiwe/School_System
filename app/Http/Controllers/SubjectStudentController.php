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

    
    public function show(SubjectStudent $subjectStudent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubjectStudent $subjectStudent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubjectStudent $subjectStudent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubjectStudent $subjectStudent)
    {
        //
    }
}
