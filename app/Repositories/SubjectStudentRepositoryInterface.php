<?php
namespace App\Repositories;

interface SubjectStudentRepositoryInterface{

    public function index();
    public function create();
    public function store($request);
     

}