<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeesInvoice extends FormRequest
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
            'grade_id'=>'unique', 
            'class_id'=>'unique', 
        ];
    }

    /**
     * Get the custom validation messages.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'grade_id.unique' => 'الصف الدراسي يجب أن يكون فريدًا.',
            'class_id.unique' => 'الفصل الدراسي يجب أن يكون فريدًا.',
        ];
    }
}
