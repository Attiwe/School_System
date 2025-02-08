<?php

namespace App\Repositories;

use App\Models\Fees;
use App\Models\FeesInvoice;
use App\Models\Student;
use App\Models\StudentAccount;
use Carbon\Carbon;
use DB;
class FeesInvoiceRepository implements FeesInvoiceRepositoryInterface
{

    public function index()
    {
        try {

            $feesInvoice = FeesInvoice::latest()->get();
            return view('pages.feesInvoices.index_invoice', compact('feesInvoice'));
        } catch (\Exception $e) {
            toastr()->error('حدث خطأ أثناء تحميل بيانات الطالب:')->$e->getMessage;
            return redirect()->back();

        }
    }
    public function showFeesInvoice($request)
    {

        try {

            $student = Student::findOrFail($request->id);

            $fees = Fees::where('grade_id', $student->grade_id)
                ->where('class_id', $student->class_id)
                ->where('year', $student->academic_year)
                ->first();

            if (!$fees) {
                toastr()->error('    لا يوجد لها  رسوم الدراسيه');
                return redirect()->back();
            }
            return view('pages.feesInvoices.show_invoiceStudent', compact(['student', 'fees']));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'حدث خطأ أثناء تحميل بيانات الطالب: ' . $e->getMessage()]);

        }

    }

    public function storeFeesInvoice($request)
    {

        //    dd( $request->all());
        $feess = FeesInvoice::where('grade_id', $request->grade)
            ->where('class_id', $request->class_title)
            ->where('student_id', $request->name)
            ->first();
        if ($feess) {
            toastr()->error('  الفتوره موجوده');
            return redirect()->back();
        }


        DB::beginTransaction();

        try {

            $fees = new FeesInvoice();
            $fees->student_id = $request->name;
            $fees->fees_id = $request->fee_title;
            $fees->grade_id = $request->grade;
            $fees->class_id = $request->class_title;
            $fees->invoice_date = Carbon::parse($request->invoice_date)->toDateString();
            $fees->amount = $request->amount;
            $fees->save();

            $studentAccount = new StudentAccount();
            $studentAccount->student_id = $request->name;
            $studentAccount->fees_invoices_id = $fees->id;
            $studentAccount->grade_id = $request->grade;
            $studentAccount->class_id = $request->class_title;
            $studentAccount->debit = $request->amount;
            $studentAccount->credit = 00.0;
            $studentAccount->desc = "--";
            $studentAccount->save();
            DB::commit();
            toastr()->success('تمت الاضافه');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => 'حدث خطأ أثناء تحميل بيانات الطالب: ' . $e->getMessage()]);
        }
    }


    public function destroy($request)
    {

        try {
            FeesInvoice::findOrFail($request->id)->delete();
            return redirect()->back();

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'حدث خطأ أثناء تحميل بيانات الطالب: ' . $e->getMessage()]);
        }
    }

}