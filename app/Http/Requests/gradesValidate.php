<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class gradesValidate extends FormRequest
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
                 'name' => 'required|unique:grades,name',
                'notes' => 'nullable',
        ];  
    }
    public function messages(): array
{
    return [
        
            'name.required' => 'ادخل اسم  المرحله',
            'name.unique' => 'اسم  المرحله موجود بالفعل',
        
    ];
}
}
