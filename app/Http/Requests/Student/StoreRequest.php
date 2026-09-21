<?php

namespace App\Http\Requests\Student;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;

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
            'nis' => ['required', 'string', 'size:4', 'unique:students,nis,'],
            'name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'in:Laki-laki,Perempuan'],
            'major' => ['required', 'in:AKL,TKJ,BiD'],
            'class' => ['required', 'string', 'max:255'],
        ];
    }

    // Bersifat JIKA diperlukan untuk mengubah message pada @error menjadi sesuai yang di inginkan

    // Untuk mengubah @error menjadi sesuai yang di inginkan
    // #[Override]
    // public function attributes()
    // {
    //     return [
    //         'nis' => 'Nomor Induk Siswa',
    //         'name' => 'Nama Lengkap',
    //         'gender' => 'Jenis Kelamin',
    //         'class' => 'Kelas',
    //         'major' => 'Jurusan'
    //     ];
    // }

    public function messages()
    {
        return [
            // untuk pesan @error NIS
            'nis.required' => 'Nomor Induk Siswa Wajib di Isi',
            // untuk pesan @error NIS jumlah karakter
            'nis.size' => 'Nomor Induk Siswa Harus 4 Karakter',
            'name.required' => 'Nama Lengkap Wajib di Isi',
            'gender.required' => 'Jenis Kelamin Wajib di Pilih',
            'major.required' => 'Jurusan Wajib di Pilih',
            'class.required' => 'Kelas Wajib di Isi',
        ];
    }
}
