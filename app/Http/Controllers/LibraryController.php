<?php

namespace App\Http\Controllers;

use App\Models\Library;
use App\Repositories\LibraryRepositoryInterface;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    protected $Library;
    public function __construct(LibraryRepositoryInterface $library)
    {
        $this->Library = $library;
    }

    public function index()
    {
        return $this->Library->index();
    }

     
    public function create()
    {
        return $this->Library->create();
    
    }
    public function store(Request $request)
    {
         return $this->Library->store($request);
    }

    public function edit(Request $request)
    {
        return $this->Library->edit($request);
    }

    public function update(Request $request )
    {
        return $this->Library->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
         return $this->Library->destroy($request);
    }
    public function download($request){
       return $this->Library->download($request);
 
    }
    
}
