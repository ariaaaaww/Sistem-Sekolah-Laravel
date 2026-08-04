<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $title = "Sistem Sekolah - Daftar Guru";
        $description = "Menampilkan daftar Guru yang terdaftar di sekolah";
        $teachers = [
            [
                'id' => 1,
                'nis' => '1001',
                'name' => 'Sifu',
                'major' => 'TKJ',
            ],
            [
                'id' => 2,
                'nis' => '1002',
                'name' => 'Cadera',
                'major' => 'AKL',
            ],
        ];

        return view(
            'teachers.index',
            [
                'title' => $title,
                'description' => $description,
                'teachers' => $teachers,
            ]
        );
    }

    public function create()
    {
        $title = "Sistem Sekolah - Tambah Guru";
        $description = "Menambahkan data Guru baru";

        return view('teachers.create', compact('title', 'description'));
    }

    public function store()
    {
        return "Melakukan penambahan data Guru";
    }

    public function show(string $id)
    {
        $title = "Sistem Sekolah - Detail Guru";
        $description = "Menampilkan detail data Guru";
        return view('teachers.show', [
            'title' => $title,
            'description' => $description,
        ]);
    }

    public function edit(string $id)
    {
        $title = "Sistem Sekolah - Edit Guru";
        $description = "Memperbarui data Guru";

        return view('teachers.edit', compact('title', 'description'));
    }

    public function update(string $id)
    {
        return "Melakukan perubahan data Guru";
    }

    public function destroy(string $id)
    {
        return "Menghapus data Guru";
    }

}
