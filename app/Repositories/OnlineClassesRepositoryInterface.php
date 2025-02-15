<?php
namespace App\Repositories;

interface OnlineClassesRepositoryInterface{
    public function index();
    public function create();
    public function store($request);
    public function destroy($request);
} 
