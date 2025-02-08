<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class ReceiptStudnetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;  
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'student_id' => ['required', 'integer', 'exists:students,id'],
            'debit' => [
                'required',
                'numeric',
                'min:0',
                function ($attribute, $value, $fail) {
                    $amount = DB::table('fees_invoices')
                        ->where('student_id', $this->student_id)
                        ->sum('amount');

                    if ($amount === null || $amount == 0) {
                        $fail('لا يوجد رسوم مستحقة لهذا الطالب.');
                    } elseif ($value > $amount) {
                        $fail("المبلغ المدفوع ($value) لا يمكن أن يكون أكبر من المبلغ المستحق ($amount).");
                    }
                }
            ],
            'notes' => ['required', 'string'],
        ];
    }
}
