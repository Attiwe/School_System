<?php
namespace App\Repositories;

interface QuestionsRepositoryInterface{
    public function index();
    public function create();
    public function store($request);
    public function edit($request);
    public function update($request);
    public function destroy($request);
}