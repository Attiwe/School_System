<?php 
namespace App\Repositories;

interface GraduateRepositoryInterface{

    public function getStudentGraduate();
    public function showStudnetGradute();
    public function sofetDelete($request);
    public function  returnStudentGraduate($request);
    public function  destroyStudentGraduate($request);
}