<?php
namespace App\Repositories;

 
interface FeesInvoiceRepositoryInterface {

    public function index();
    public function showFeesInvoice($request);
    public function storeFeesInvoice($request);
    public function destroy($request); 

}