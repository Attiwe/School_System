<?php

namespace App\Http\Controllers;

use App\Models\OnlineClasses;
use App\Repositories\OnlineClassesRepositoryInterface;
use Illuminate\Http\Request;

class OnlineClassesController extends Controller
{
    private $OnlineClass;
    public function __construct(OnlineClassesRepositoryInterface $onlineclasses)
    {
        $this->OnlineClass = $onlineclasses;
    }
    public function index()
    {
        return $this->OnlineClass->index();
    }

     
    public function create()
    {
        return $this->OnlineClass->create();

    }

    
    public function store(Request $request)
    {
        return $this->OnlineClass->store($request);

    }

    public function destroy(Request $request)
    {
         return $this->OnlineClass->destroy($request);
    }
}
