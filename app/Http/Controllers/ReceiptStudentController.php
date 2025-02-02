<?php

namespace App\Http\Controllers;

use App\Models\ReceiptStudent;
 
 use App\Repositories\ReceiptRepositoryInterface;
use Illuminate\Http\Request;

class ReceiptStudentController extends Controller
{
    
    protected $Receipt;

    public function __construct(ReceiptRepositoryInterface $receipt){
        $this->Receipt = $receipt;
    }

    public function index()
    {
        return  $this->Receipt->index();
    }

    public function create()
    {
        //
    }
    public function store(Request $request)
    {
         return $this->Receipt->store($request);
    }

    
    public function show($id)
    {
        return $this->Receipt->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        return $this->Receipt->edit($request);
    }

    /**
     * Update the specified resource in storage.
     */
    
    public function update(Request $request)
    {
        return $this->Receipt->update($request); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    { 
        return $this->Receipt->destroy($request);
    }
}
