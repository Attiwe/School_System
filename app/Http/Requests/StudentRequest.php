<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
        'grade_id'=>'required',
        'class_id'=>'required',
        'section_id'=>'required',
        'name'=>'required|string',
        'academic_year'=>'required',
        'date_birth'=>'required|date',
        'gender'=>'required',
        'email' => 'required|email',   
        'parents_id'=>'nullable',
        'nationalitie_id'=>'nullable',
        'blood_id'=>'nullable',
        // 'password' => 'required|min:6|max:50',   
        'password' => 'required',   
    ];
} 

    public function messages(): array
    {
    return [
        'grade_id.required' => 'الصف الدراسي مطلوب.',
        'class_id.required' => 'الفصل مطلوب.',
        'section_id.required' => 'القسم مطلوب.',
        'name.required' => 'اسم الطالب مطلوب.',
        'name.string' => 'اسم الطالب يجب أن يكون نصاً.',
        'academic_year.required' => 'السنة الدراسية مطلوبة.',
        'date_birth.required' => 'تاريخ الميلاد مطلوب.',
        'date_birth.date' => 'تاريخ الميلاد يجب أن يكون تاريخاً صحيحاً.',
        'gender.required' => 'الجنس مطلوب.',
        'email.required' => 'البريد الإلكتروني مطلوب.',
        'email.email' => 'البريد الإلكتروني يجب أن يكون صالحاً.',
        
        'password.required' => 'كلمة المرور مطلوبة.',
        'password.min' => 'كلمة المرور يجب أن تكون على الأقل 6 أحرف.',
        'password.max' => 'كلمة المرور يجب ألا تتجاوز 50 حرفاً.',
        'password.regex' => 'كلمة المرور يجب أن تحتوي على حروف وأرقام.',
    ];
    }
}
