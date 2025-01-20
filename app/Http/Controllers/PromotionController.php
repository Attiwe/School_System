<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use App\Repositories\PromotionStudentRepositoriesInterface;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    
    protected $Promotion;
    public function __construct(PromotionStudentRepositoriesInterface $promotion){
          $this->Promotion = $promotion;
    }

    public function index()
    {
         return  $this->Promotion->getAllPromotion();
    }

    
    public function create()
    { 
      return $this->Promotion->createPromotion();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          return $this->Promotion->storagPromotion($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Promotion $promotion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Promotion $promotion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Promotion $promotion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Promotion $promotion)
    {
        //
    }
}
