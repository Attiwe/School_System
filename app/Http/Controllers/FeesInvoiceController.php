<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeesInvoice;
use App\Repositories\FeesInvoiceRepositoryInterface;
use Illuminate\Http\Request;

class FeesInvoiceController extends Controller
{
    private $FeesInvoice;

    public function __construct(FeesInvoiceRepositoryInterface $feesInvoice)
    {
        $this->FeesInvoice = $feesInvoice;
    }
    public function index()
    {
        return $this->FeesInvoice->index();
    }

    public function store(Request $request)
    {

        return $this->FeesInvoice->storeFeesInvoice($request);
    }


    public function show(Request $request)
    {
        return $this->FeesInvoice->showFeesInvoice($request);
    }
    public function edit(Request $request)
    {
        return $this->FeesInvoice->edit($request);
    }

   
     
    public function update(Request $request, FeesInvoice $feesInvoice)
    {
        //
    }

    
    public function destroy(Request $request)
    {
        return $this->FeesInvoice->destroy($request);
    }
}
