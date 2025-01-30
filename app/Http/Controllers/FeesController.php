<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeesRequest;
use App\Models\Fees;
use App\Repositories\FeesRepositoryInterface;
use Illuminate\Http\Request;

class FeesController extends Controller
{
    
    private $Fees;
    public function __construct( FeesRepositoryInterface $fees ){
        $this->Fees=$fees;
    }

    public function index()
    {
        return $this->Fees->getFees();
    }

    
    public function create()
    {
         return $this->Fees->createFees();
    }
    public function store(FeesRequest $request)
    { 
         return $this->Fees->storeFees($request);
    }
 
    public function edit(Request $request)
    {
         return $this->Fees->editFees($request);
    }

    
    public function update(FeesRequest $request )
    {
         return $this->Fees->updateFees($request);
     }
    public function show(Request $request )
    {
         return $this->Fees->showFees($request);

    }
    public function destroy(Request $request)
    {
        return $this->Fees->destroyFees($request);  
    }

    

}
