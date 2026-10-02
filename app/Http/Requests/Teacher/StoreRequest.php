<?php

namespace App\Http\Requests\Teacher;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nip' => ['required', 'string', 'size:12', 'unique:teachers,nip'],
            'name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'in:Laki-laki,Perempuan'],
            'subject' => ['required', 'string', 'max:255'],
            'phone_number' => ['nullable', 'string', 'max:13'],
            'status' => ['required', 'string', 'in:Aktif,Tidak Aktif'],
        ];
    }

    public function messages()
    {
        return [
            'nip.required' => 'Nomor Induk Guru Wajib di Isi',
            'nip.size' => 'Nomor Induk Guru Harus 12 Karakter',
            'name.required' => 'Nama Lengkap Wajib di Isi',
            'gender.required' => 'Jenis Kelamin Wajib di Pilih',
            'subject.required' => 'Mata Pelajaran Wajib di Pilih',
            'phone_number.max' => 'Nomor Telepon Maksimal 13 Karakter',
            'status.required' => 'Status Wajib di Pilih',
        ];
    }
}
