<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use App\Repositories\PromotionStudentRepositoriesInterface;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    protected $Promotion;
    public function __construct(PromotionStudentRepositoriesInterface $promotion)
    {
        $this->Promotion = $promotion;
    }

    public function index()
    {
        return $this->Promotion->getAllPromotion();
    }

    public function create()
    {
        return $this->Promotion->createPromotion();
    }


    public function store(Request $request)
    {
        return $this->Promotion->storagPromotion($request);
    }

    public function destroy(Request $request)
    {
        return $this->Promotion->destroyPromotion($request);

    }
}
