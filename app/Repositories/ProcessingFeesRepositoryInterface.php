<?php 
namespace App\Repositories;

interface ProcessingFeesRepositoryInterface{
    public function index();
    public function show($request);
    public function store($request);
    public function destroy($request);
    public function edit($request);
    public function update($request);
 }