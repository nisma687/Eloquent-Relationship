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
            "name"=> "required||max:231||string",
            "class"=> "required||max:100||string",
            "roll"=> "required||max:231||numeric",
            "Father_name"=> "required||max:231||string",
            "Mother_name"=> "required||max:231||string",
            "student_id"=> "required||max:231||numeric",
            "courses" => "required|array",
            "courses.*.0" => "required|string",
            "courses.*.1" => "required|string", 
        ];
    }
    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    // protected function prepareForValidation()
    // {
    //     $this->merge([
    //         'courses' => $this->input('courses')
    //     ]);
    // }
}
