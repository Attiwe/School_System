<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentStudnetRequest;
use App\Models\PaymentStudent;
use App\Models\Student;
use App\Repositories\PaymentStudentRepositoryInterface;
use Illuminate\Http\Request;

class PaymentStudentController extends Controller
{
    protected $Payment;
    public function __construct(PaymentStudentRepositoryInterface $paymentStudnet)
    {
        $this->Payment = $paymentStudnet;
    }
    public function index()
    {
        return $this->Payment->index();
    }
    public function store(PaymentStudnetRequest $request)
    {
        return $this->Payment->store($request);
    }

    public function show(Request $request)
    {
        return $this->Payment->show($request);
    }

    public function edit(Request $request)
    {
        return $this->Payment->edit($request);
    }
    public function update(Request $request)
    {
        return $this->Payment->update($request);
    }

    public function destroy(Request $request)
    {
        return $this->Payment->destroy($request);
    }
}
