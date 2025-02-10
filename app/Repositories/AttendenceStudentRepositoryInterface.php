<?php 
namespace App\Repositories;

interface AttendenceStudentRepositoryInterface{
    public function index();
    public function showAttendenceStudent();
    public function show($request);
    public function store($request);
    public function edit($request);
    public function update($request);
    public function destroy($request);  
}