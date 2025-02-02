<?php
namespace App\Repositories;

use App\Models\FundAccount;
use App\Models\ReceiptStudent;
use App\Models\Student;
use App\Models\StudentAccount;
use Carbon\Carbon;
use DB;
use PhpParser\Internal\TokenStream;
 
class ReceiptRepository implements ReceiptRepositoryInterface
{

    public function index(){

        $receipts = ReceiptStudent::latest()->get(); 
        return view('pages.ReceiptStudent.index_receiptStudnet',compact('receipts') );
    }
    public function show($id)
    {
        $student = Student::findOrFail($id);
        return view('pages.ReceiptStudent.create_receiptStudent', compact('student'));
    }

    public function store($request)
    {

        //  return $receipt;      
        $request->validate([
            'student_id' => 'required|integer|exists:students,id',
            'debit' => 'required|numeric|min:0',
 
            'notes' => 'required|string',
         ]);

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

    public function edit($request){
         
         $receipt = ReceiptStudent::findOrFail($request->edit);
           return view('pages.ReceiptStudent.edit_receiptStudent',compact('receipt'));
    }
    public function update($request){
      
        //   return $request;
 $request->validate([
            'student_id' => 'required|integer|exists:students,id',
            'debit' => 'required|numeric|min:0',
            'notes' => 'required|string',
        ]);

        DB::beginTransaction();
        try {
            $receipt = ReceiptStudent::where('student_id',$request->student_id)->first();
            $receipt->student_id = $request->student_id;
            $receipt->debit = $request->debit;
            $receipt->date = Carbon::now()->toDateTimeString();
            $receipt->desc = $request->notes;
            $receipt->save();

            $fundAccount = FundAccount::where('receipt_id',$receipt->id)->first();;
            $fundAccount->receipt_id = $receipt->id;
            $fundAccount->date = Carbon::now()->toDateTimeString();
            $fundAccount->debit = $request->debit;
            $fundAccount->credit = 0.0;
            $fundAccount->desc = $request->notes;
            $fundAccount->save();

            $studnetAccount =  StudentAccount::where('receipt_id',$receipt->id)->first();;
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

    public function destroy($request){
        
        try {
             $receipt = ReceiptStudent::findOrFail($request->id);
             $receipt->delete();
              return redirect()->back();
         } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'حدث خطأ أثناء إضافة السند: ' . $e->getMessage()]);
        }
    }


}