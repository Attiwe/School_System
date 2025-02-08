<?php
namespace App\Repositories;

use App\Models\Fees;
use App\Models\FeesInvoice;
use App\Models\FundAccount;
use App\Models\ProcessingFees;
use App\Models\ReceiptStudent;
use App\Models\Student;
use App\Models\StudentAccount;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Validator;
class ReceiptRepository implements ReceiptRepositoryInterface
{

    public function index()
    {

        $receipts = ReceiptStudent::latest()->get();
        return view('pages.ReceiptStudent.index_receiptStudnet', compact('receipts'));
    }
    public function show($id)
    {
        $student = Student::findOrFail($id);
        return view('pages.ReceiptStudent.create_receiptStudent', compact('student'));
    }

    public function store($request)
    {

        $fees = FeesInvoice::where('student_id', $request->student_id)->sum('amount');
        $receipt = ReceiptStudent::where('student_id', $request->student_id)->sum('debit');
        
        $remaining = $fees - $receipt;  
        
        if ($remaining <= 0) {
            toastr()->error("لا يوجد مبلغ مستحق لهذا الطالب.");
            return redirect()->back();
        }
        
        if ($receipt + $request->debit > $fees) {
            $exceededAmount = ($receipt + $request->debit) - $fees;
            toastr()->error("المبلغ المدفوع أكبر من المبلغ المستحق. المبلغ الزائد: $exceededAmount");
            return redirect()->back();
        }
        
        
        DB::beginTransaction();
        try {
            $receipt = new ReceiptStudent();
            $receipt->student_id = $request->student_id;
            $receipt->debit = $request->debit;
            $receipt->date = Carbon::now()->toDateTimeString();
            $receipt->desc = $request->notes;
            $receipt->save();

            $fundAccount = new FundAccount();
            $fundAccount->receipt_id = $receipt->id;
            $fundAccount->date = Carbon::now()->toDateTimeString();
            $fundAccount->debit = $request->debit;
            $fundAccount->credit = 0.0;
            $fundAccount->desc = $request->notes;
            $fundAccount->save();

            $studnetAccount = new StudentAccount();
            $studnetAccount->student_id = $request->student_id;
            $studnetAccount->receipt_id = $receipt->id;
            $studnetAccount->debit = 0.0;
            $studnetAccount->credit = $request->debit;
            $studnetAccount->desc = $request->notes;
            $studnetAccount->save();

            DB::commit();
            toastr()->message('تم ');
            return redirect()->back()->with('success', 'تم إضافة السند بنجاح.');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => 'حدث خطأ أثناء إضافة السند: ' . $e->getMessage()]);
        }
    }

    public function edit($request)
    {

        $receipt = ReceiptStudent::findOrFail($request->edit);
        return view('pages.ReceiptStudent.edit_receiptStudent', compact('receipt'));
    }
    public function update($request)
    {

        // $fees = FeesInvoice::where('student_id', $request->student_id)->sum('amount');
        // $receipt = ReceiptStudent::where('student_id', $request->student_id)->sum('debit');
        // $remaining = $fees - $receipt;  
        
        // // if ($remaining <= 0) {
        // //     toastr()->error("لا يوجد مبلغ مستحق لهذا الطالب.");
        // //     return redirect()->back();
        // // }
        
        // if ($receipt + $request->debit > $fees) {
        //     $exceededAmount = ($receipt + $request->debit) - $fees;
        //     toastr()->error("المبلغ المدفوع أكبر من المبلغ المستحق. المبلغ الزائد: $exceededAmount");
        //     return redirect()->back();
        // }
        

        DB::beginTransaction();
        try {
            $receipt = ReceiptStudent::where('student_id', $request->student_id)->first();
            $receipt->student_id = $request->student_id;
            $receipt->debit = $request->debit;
            $receipt->date = Carbon::now()->toDateTimeString();
            $receipt->desc = $request->notes;
            $receipt->save();

            $fundAccount = FundAccount::where('receipt_id', $receipt->id)->first();
            ;
            $fundAccount->receipt_id = $receipt->id;
            $fundAccount->date = Carbon::now()->toDateTimeString();
            $fundAccount->debit = $request->debit;
            $fundAccount->credit = 0.0;
            $fundAccount->desc = $request->notes;
            $fundAccount->save();

            $studnetAccount = StudentAccount::where('receipt_id', $receipt->id)->first();
            ;
            $studnetAccount->student_id = $request->student_id;
            $studnetAccount->receipt_id = $receipt->id;
            $studnetAccount->debit = 0.0;
            $studnetAccount->credit = $request->debit;
            $studnetAccount->desc = $request->notes;
            $studnetAccount->save();

            DB::commit();
            toastr()->message('تم ');
            return redirect()->route('receipt.index')->with('success', 'تم إضافة السند بنجاح.');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => 'حدث خطأ أثناء إضافة السند: ' . $e->getMessage()]);
        }

    }

    public function destroy($request)
    {

        try {
            $receipt = ReceiptStudent::findOrFail($request->id);
            $receipt->delete();
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'حدث خطأ أثناء إضافة السند: ' . $e->getMessage()]);
        }
    }


}