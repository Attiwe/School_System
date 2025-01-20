<?php 
namespace App\Repositories;

 interface PromotionStudentRepositoriesInterface{

    public function getAllPromotion();
    public function storagPromotion($request);
    public function createPromotion();
}