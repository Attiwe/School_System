<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Repositories\GraduateRepositoryInterface;
use Illuminate\Http\Request;

class GraduateController extends Controller
{
    private $Graduate;
    public function __construct(GraduateRepositoryInterface $graduate)
    {
        $this->Graduate = $graduate;
    }


    public function index()
    {
        return $this->Graduate->getStudentGraduate();
    }


    public function create()
    {
        return $this->Graduate->showStudnetGradute();
    }


    public function store(Request $request)
    {
        return $this->Graduate->sofetDelete($request);
    }


    public function returnGraduate(Request $request)
    {
        return $this->Graduate->returnStudentGraduate($request);
    }


    public function destroy(Request $request)
    {
        return $this->Graduate->destroyStudentGraduate($request);
    }
}
