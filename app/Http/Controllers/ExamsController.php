<?php

namespace App\Http\Controllers;

use App\Models\Exams;
use App\Repositories\ExamsRepositoryInterface;
use Illuminate\Http\Request;

class ExamsController extends Controller
{
    private $Exams;
    public function __construct(  ExamsRepositoryInterface $exams ){
        $this->Exams=$exams;
    }
    public function index()
    {
         return $this->Exams->index();
    }

    public function create()
    {
        return $this->Exams->create();
    }
 
    public function store(Request $request)
    {
        return $this->Exams->store($request);
    }
 
    public function edit(Request $request): mixed
    {
        return $this->Exams->edit($request);

    }
 
    public function update(Request $request )
    {
        return $this->Exams->update($request);

    }

    public function destroy(Request $request)
    {
        return $this->Exams->destroy($request);

    }
}
