<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppointmentsRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'joining_date' => 'required|date',
            'Specialization_id' => 'required|exists:specializations,id',
            'phone' => 'required|numeric|digits_between:11,20',
            'address' => 'nullable|max:255',
        ];
    }
    public function messages(): array
{
    return [
        'name.required' => 'حقل الاسم مطلوب.',
        'name.string' => 'الاسم يجب أن يكون نصًا.',
        'email.required' => 'حقل البريد الإلكتروني مطلوب.',
        'email.email' => 'يجب إدخال بريد إلكتروني صالح.',
         'joining_date.required' => 'حقل تاريخ الانضمام مطلوب.',
        'joining_date.date' => 'تاريخ الانضمام يجب أن يكون تاريخًا صحيحًا.',
        'Specialization_id.required' => 'حقل التخصص مطلوب.',
        'Specialization_id.exists' => 'التخصص المحدد غير موجود.',
         'phone.required' => 'حقل الهاتف مطلوب.',
        'phone.numeric' => 'رقم الهاتف يجب أن يكون أرقامًا فقط.',
        'phone.digits_between' => 'رقم الهاتف يجب أن يتكون من 11 إلى 20 رقمًا.',
        'address.max' => 'العنوان يجب ألا يتجاوز 255 حرفًا.', 
        'address.string' => 'العنوان يجب أن يكون نصًا.',
       ];
}

}
