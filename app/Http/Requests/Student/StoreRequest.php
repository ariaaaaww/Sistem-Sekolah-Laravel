<?php

namespace App\Http\Requests\Student;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nis' => ['required', 'string', 'max:4', 'unique:students,nis'],
            'name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'in:Laki-laki,Perempuan'],
            'class' => ['required', 'string', 'max:50'],
            'major' => ['required', 'string', 'in:TKJ,AKL,BiD'],
        ];
    }
}
