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

    /**
     * Display the specified resource.
     */
    public function show(Library $library)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Library $library)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Library $library)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Library $library)
    {
        //
    }
    public function download($request){
       return $this->Library->download($request);
 
    }
    
}
