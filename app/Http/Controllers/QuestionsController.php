<?php

namespace App\Http\Controllers;

use App\Models\Questios;
use App\Repositories\QuestionsRepositoryInterface;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    private $Question;
    public function __construct(  QuestionsRepositoryInterface $question ){
        $this->Question=$question;
    }
    public function index()
    {
         return $this->Question->index();
    }

    public function create()
    {
        return $this->Question->create();
    }
 
    public function store(Request $request)
    {
        return $this->Question->store($request);
    }
 
    public function edit(Request $request): mixed
    {
        return $this->Question->edit($request);

    }
 
    public function update(Request $request )
    {
        return $this->Question->update($request);

    }

    public function destroy(Request $request)
    {
        return $this->Question->destroy($request);

    }
}
