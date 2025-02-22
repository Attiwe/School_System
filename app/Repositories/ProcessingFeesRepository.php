<?php
namespace App\Repositories;

 
use App\Models\ProcessingFees;
use App\Models\Student;
use App\Models\StudentAccount;
use Carbon\Carbon;
use DB;
use Log;
use PhpParser\Internal\TokenStream;
use Validator;

class ProcessingFeesRepository implements ProcessingFeesRepositoryInterface
{
    public function index()
    {
        $processingFees = ProcessingFees::select('id','student_id','date','amount','desc')->latest()->get();
        return view('pages.processingFeess.index_processingFees', compact('processingFees'));
    }
    public function show($request)
    {

        try {
            $student = Student::with('student_account')->where('id', $request->id)->first();

            if (!$student) {
                toastr()->error("الطالب غير موجود.");
                return redirect()->back();
            }

            if ($student->student_account->isEmpty()) {
                toastr()->error("لا يوجد حساب رسوم الطالب  .");
                return redirect()->back();
            }

            return view('pages.processingFeess.createExclude_student', compact('student'));
        } catch (\Exception $e) {
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }
    public function store($request)
    {
        $validator = Validator::make($request->all(), [
            'student_id' => ['required', 'integer', 'exists:students,id'],
            'amount' => [
                'required',
                'numeric',
                'min:0',

                function ($attribute, $value, $fail) use ($request) {
                    $debit = DB::table('student_accounts')
                        ->where('student_id', $request->student_id)
                        ->sum('debit');

                    if ($debit === null || $debit == 0) {
                        $fail('لا يوجد رسوم مستحقة لهذا الطالب.');
                    } elseif ($value > $debit) {
                        $fail("المبلغ المدفوع ($value) لا يمكن أن يكون أكبر من المبلغ المستحق ($debit).");
                    }
                }
            ],
            'desc' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $existingFee = ProcessingFees::where('student_id', $request->student_id)->first();
        if ($existingFee) {
            toastr()->error('الطالب مستبعد مسبقًا');
            return redirect()->back();
        }


        DB::beginTransaction();
        try {

            $processingFees = new ProcessingFees();
            $processingFees->student_id = $request->student_id;
            $processingFees->date = Carbon::now()->toDateTimeString();
            $processingFees->amount = $request->amount;
            $processingFees->desc = $request->desc;
            $processingFees->save();

            $studnetAccount = new StudentAccount();
            $studnetAccount->student_id = $request->student_id;
            $studnetAccount->processFees_id = $processingFees->id;
            $studnetAccount->debit = 0.0;
            $studnetAccount->credit = $request->amount;
            $studnetAccount->desc = $request->desc;
            $studnetAccount->save();

            DB::commit();
            toastr()->message('تم ');
            return redirect()->back();

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error in store method: ' . $e->getMessage());
            toastr()->error('حدث خطأ أثناء الإضافة.');
            return redirect()->back();
        }
    }
    public function edit($request)
    {
        $procesingFees = ProcessingFees::findOrFail($request->edit);
        return view('pages.processingFeess.edit_processingFees', compact('procesingFees'));
    }
    public function update($request)
    {
        //   dd($request->all());

        DB::beginTransaction();
        try {

            $processingFees = ProcessingFees::where('id',$request->id)->first();
            $processingFees->student_id = $request->student_id;
            $processingFees->date = Carbon::now()->toDateTimeString();
            $processingFees->amount = $request->amount;
            $processingFees->desc = $request->desc;
            $processingFees->save();

            $studnetAccount =   StudentAccount::where('processFees_id',$processingFees->id)->first();
            $studnetAccount->student_id = $request->student_id;
            $studnetAccount->processFees_id = $processingFees->id;
            $studnetAccount->debit = 0.0;
            $studnetAccount->credit = $request->amount;
            $studnetAccount->desc = $request->desc;
            $studnetAccount->save();

            DB::commit();
             toastr()->success('تم التعديل');
            return redirect()->route('processfees.index');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error in store method: ' . $e->getMessage());
            toastr()->error('حدث خطأ أثناء الإضافة.');
            return redirect()->back();
        }
    }
    public function destroy($request)
    {
        try {
            $processing = ProcessingFees::findOrFail($request->id);
            $processing->delete();
            toastr()->error('تم الخذف');
            return redirect()->back();
        } catch (\Exception $e) {
            Log::error('Error in store method: ' . $e->getMessage());
            toastr()->error('حدث خطأ أثناء الإضافة.');
            return redirect()->back();
        }
    }
}