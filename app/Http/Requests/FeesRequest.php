<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FeesRequest extends FormRequest
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
            'title' => 'required|max:255',
            'amount' => 'required|numeric',
            'grade_id'=>'required',
            // 'grade_id' => [
            //     'required',
            //     Rule::unique(  'fees')->where(function ($query) {
            //         return $query->where('class_id', $this->class_id)
            //             ->where('year', $this->year);
            //     }),
            // ],
            'class_id' => 'required',
            'year' => 'required',
            'desc' => 'nullable',
        ];
    }


    public function messages(): array
    {
        return [
            'title.required' => 'حقل العنوان مطلوب.',
            'title.max' => 'يجب ألا يتجاوز العنوان 255 حرفًا.',
            'amount.required' => 'حقل المبلغ مطلوب.',
            'amount.numeric' => 'يجب أن يكون المبلغ رقمًا.',
            'grade_id.required' => 'حقل الصف مطلوب.',
            'grade_id.unique' => 'لا يمكن إدخال الرسوم لنفس المرحلة والصف والسنة أكثر من مرة.',
            'class_id.required' => 'حقل الفصل مطلوب.',
            'year.required' => 'حقل السنة مطلوب.',
            'desc.nullable' => 'حقل الوصف اختياري.',
        ];
    }


}
