<?php
namespace App\Repositories;

use App\Models\FundAccount;
use App\Models\PaymentStudent;
use App\Models\Student;
use App\Models\StudentAccount;
use Carbon\Carbon;
use DB;
use Log;

class PaymentStudentRepository implements PaymentStudentRepositoryInterface
{
    public function index()
    {
        $paymaentStudent = PaymentStudent::select('id','student_id','date','amount','desc')-> latest()->get();
        return view('pages.paymebtStudent.index_paymentStudent', compact('paymaentStudent'));
    }
    public function show($request)
    {

        try {
            $student = Student::findOrFail($request->id);
            $studnetAccount = StudentAccount::where('student_id', $request->id)->first();
            if ($studnetAccount) {

                return view('pages.paymebtStudent.create_paymentStudent', compact('student'));
            }
            toastr()->error('الطالب ليس لديه فتوره رسوم ');
            return redirect()->back();
        } catch (\Exception $e) {
            toastr()->error($e->getMessage());
            return redirect()->back();
        }

    }
    public function store($request)
    {
        //  return $request->all();

        DB::beginTransaction();

        try {
            $paymentStudent = new PaymentStudent();
            $paymentStudent->student_id = $request->student_id;
            $paymentStudent->date = Carbon::now()->toDateTimeString();
            $paymentStudent->amount = $request->amount;
            $paymentStudent->desc = $request->desc;
            $paymentStudent->save();

            $studentAccount = new StudentAccount();
            $studentAccount->student_id = $request->student_id;
            $studentAccount->debit = $request->amount;
            $studentAccount->credit = 0.00;
            $studentAccount->desc = $request->desc;
            $studentAccount->payment_id = $paymentStudent->id;
            $studentAccount->save();

            $fundAccount = new FundAccount();
            $fundAccount->date = Carbon::now()->toDateTimeString();
            $fundAccount->debit = 0.00;
            $fundAccount->credit = $request->amount;
            $fundAccount->desc = $request->desc;
            $fundAccount->payment_id = $paymentStudent->id;
            $fundAccount->save();

            DB::commit();
            toastr()->success('تم الاضافه ');
            return redirect()->route('paymentStudnet.index');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error in store method: ' . $e->getMessage());
            toastr()->error('حدث خطأ أثناء الإضافة.');
            return redirect()->back();

        }
    }
    public function edit($request)
    {
        $payment = PaymentStudent::findOrFail($request->edit);
         
        return view('pages.paymebtStudent.edit_paymentStudent',compact('payment'));
    }
    public function update($request){
         DB::beginTransaction();

        try {
            $paymentStudent =   PaymentStudent::findOrFail( $request->student_id) ;
            $paymentStudent->date = Carbon::now()->toDateTimeString();
            $paymentStudent->student_id = $request->student_id;
            $paymentStudent->amount = $request->amount;
            $paymentStudent->desc = $request->desc;
            $paymentStudent->save();

            $studentAccount =   StudentAccount::where('payment_id' ,$paymentStudent->id)->first();
            $studentAccount->student_id = $request->student_id;
            $studentAccount->debit = $request->amount;
            $studentAccount->credit = 0.00;
            $studentAccount->desc = $request->desc;
            $studentAccount->payment_id = $paymentStudent->id;
            $studentAccount->save();

            $fundAccount =   FundAccount::where('payment_id',$paymentStudent->id)->first();;
            $fundAccount->date = Carbon::now()->toDateTimeString();
            $fundAccount->debit = 0.00;
            $fundAccount->credit = $request->amount;
            $fundAccount->desc = $request->desc;
            $fundAccount->payment_id = $paymentStudent->id;
            $fundAccount->save();

            DB::commit();
            toastr()->success('تم التعديل');
            return redirect()->route('paymentStudnet.index');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error in store method: ' . $e->getMessage());
            toastr()->error('حدث خطأ أثناء التعديل.');
            return redirect()->back();

        }

    }
    public function destroy($request) {

        try {
            $paymant = PaymentStudent::findOrFail($request->id);
            $paymant->delete();
            toastr()->error('تم  الحذف ');
            return redirect()->back();

        } catch (\Exception $e) {
            toastr()->error('حدث خطأ أثناء الحذف.');
            return redirect()->back();

        }


    }
}