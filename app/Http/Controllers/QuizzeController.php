<?php

namespace App\Http\Controllers;

use App\Repositories\QuizzeRepositoryInterface;
use Illuminate\Http\Request;

class QuizzeController extends Controller
{
    private $Quizze;
    public function __construct(  QuizzeRepositoryInterface $quizze ){
        $this->Quizze=$quizze;
    }
    public function index()
    {
         return $this->Quizze->index();
    }

    public function create()
    {
        return $this->Quizze->create();
    }
 
    public function store(Request $request)
    {
        return $this->Quizze->store($request);
    }
 
    public function edit(Request $request): mixed
    {
        return $this->Quizze->edit($request);

    }
 
    public function update(Request $request )
    {
        return $this->Quizze->update($request);

    }

    public function destroy(Request $request)
    {
        return $this->Quizze->destroy($request);

    }
}
