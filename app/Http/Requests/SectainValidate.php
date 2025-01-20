<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SectainValidate extends FormRequest
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
            'nameSectian' => 'required|unique:sections,nameSectian,NULL,id,grade_id,' . $this->grade_id  .$this->class_id,
            'grade_id' => 'required',
            'class_id' => 'required',
            'teacher_id' => 'required',
            'appointment_id' => 'required',
            'notes' => 'nullable',
        ];
    }
    
    public function messages(): array
    {
        return [
            'nameSectian.required' => 'ادخل اسم الفصل',
            'nameSectian.unique' => 'اسم الفصل موجود بالفعل ضمن نفس المرحلة',
            'grade_id.required' => 'ادخل اسم المرحله',
            'teacher_id.required' => 'ادخل اسم الدكتور',
            'appointment_id.required' => 'ادخل اسم المعيد',
            'class_id.required' => 'ادخل اسم الصف',
        ];
    }
        
    
    
    
}
