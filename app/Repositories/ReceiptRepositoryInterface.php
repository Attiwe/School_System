<?php
namespace App\Repositories;

interface ReceiptRepositoryInterface
{

    public function index();
    public function show($id);
    public function store($request);

    public function edit($request);
    public function update($request);
    public function destroy($request);


}