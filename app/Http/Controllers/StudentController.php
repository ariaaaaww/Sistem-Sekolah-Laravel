<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $title = "Sistem Sekolah - Direktori Siswa";
        $description = "Menampilkan daftar siswa yang terdaftar di sekolah";
        $students = [
            [
                'id' => 1,
                'nis' => '1001',
                'name' => 'Andi',
                'class' => 'XII TKJ 1',
                'major' => 'TKJ',
            ],
            [
                'id' => 2,
                'nis' => '1002',
                'name' => 'Budi',
                'class' => 'XII AKL 1',
                'major' => 'AKL',
            ],
        ];

        return view('students.index', 
        [
            'title' => $title,
            'description' => $description,
            'students' => $students,
        ]);
    }

    public function create()
    {
        $title = "Sistem Sekolah - Registrasi Siswa";
        $description = "Menambahkan data siswa baru";

        return view('students.create', compact('title', 'description'));
    }

    public function store()
    {
        return "Melakukan penambahan data siswa";
    }

    public function show(string $id)
    {
        $title = "Sistem Sekolah - Rincian Siswa";
        $description = "Menampilkan detail data siswa";
        return view('students.show', [
            'title' => $title,
            'description' => $description,
        ]);
    }

    public function edit(string $id)
    {
        $title = "Sistem Sekolah - Penyuntingan Siswa";
        $description = "Memperbarui data siswa";

        return view('students.edit', compact('title', 'description'));
    }

    public function update(string $id)
    {
        return "Melakukan perubahan data siswa";
    }

    public function destroy(string $id)
    {
        return "Menghapus data siswa";
    }

}
