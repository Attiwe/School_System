<?php 
namespace App\Repositories;

interface FeesRepositoryInterface{

    public function getFees();
    
    public function createFees();
    public function storeFees($request);
    public function editFees($request);
    public function updateFees($request);
    public function  showFees($request);
    public function destroyFees($request);
}