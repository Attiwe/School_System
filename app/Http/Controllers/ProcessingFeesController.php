<?php

namespace App\Http\Controllers;

use App\Models\ProcessingFees;
use App\Repositories\ProcessingFeesRepositoryInterface;
use Illuminate\Http\Request;

class ProcessingFeesController extends Controller
{
    protected $ProcessingFees;
    public function __construct(ProcessingFeesRepositoryInterface $processingFees)
    {
        $this->ProcessingFees = $processingFees;
    }
    public function index()
    {
        return $this->ProcessingFees->index();
    }
    public function store(Request $request)
    {
        return $this->ProcessingFees->store($request);
    }
    public function show(Request $request)
    {
        return $this->ProcessingFees->show($request);
    }
    public function edit(Request $request)
    {
        return $this->ProcessingFees->edit($request);
    }
    public function update(Request $request)
    {
        return $this->ProcessingFees->update($request);
    }
    public function destroy(Request $request)
    {
        return $this->ProcessingFees->destroy($request);
    }
}
