<?php
namespace App\Repositories;

use App\Http\Requests\StudentRequest;
interface StudentRepositoryInterface
{
    public function showStudent();
    public function createStudent();
    public function storeStudent(StudentRequest $request);
    public function editStudent($id);
    public function show_Student($id);
    public function updateStudent($request);
    public function deleteStudent($id);
    public function deleteAttachmentStudent($request);
    public function uploadeAttachment($request);
    public function getClassRome($grade_id);
    public function getSection($class_id);
}