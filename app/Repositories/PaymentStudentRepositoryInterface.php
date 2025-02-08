<?php
namespace App\Repositories;

 interface PaymentStudentRepositoryInterface{
    public function index();
    public function show($request);
    public function store($request);
    public function edit($request);
    public function update($request);
    public function destroy($request);
    
 }