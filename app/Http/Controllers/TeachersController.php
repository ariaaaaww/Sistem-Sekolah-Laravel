<?php

namespace App\Http\Controllers;

use App\Http\Requests\Teacher\StoreRequest;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeachersController extends Controller
{
    public function index()
    {
        $title = 'Sistem Sekolah - Direktori Guru';
        $description = 'Menampilkan daftar Guru yang terdaftar di sekolah';
        $teachers = Teacher::select('id', 'nip', 'name', 'gender', 'subject', 'phone_number', 'status')->get();
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
        $title = 'Sistem Sekolah - Registrasi Guru';
        $description = 'Menambahkan data Guru baru';

        return view('teachers.create', compact('title', 'description'));
    }

    public function store(StoreRequest $request)
    {

        $validatedRequest = $request->validated();
        Teacher::create($validatedRequest);

        return redirect()->route('teachers.index')->with('success', 'Guru berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $title = 'Sistem Sekolah - Rincian Guru';
        $description = 'Menampilkan detail data Guru';
        $teachers = [
            [
                'id' => 1,
                'nip' => '198501012024',
                'name' => 'Budi Santoso',
                'gender' => 'Laki-Laki',
                'subject' => 'Akuntansi Dasar',
                'phone' => '081234560001',
                'status' => 'Aktif',
            ],
            [
                'id' => 2,
                'nip' => '198703152024',
                'name' => 'Siti Aminah',
                'gender' => 'Perempuan',
                'subject' => 'Jaringan Komputer',
                'phone' => '081234560002',
                'status' => 'Aktif',
            ],
        ];

        return view('teachers.show', [
            'title' => $title,
            'description' => $description,
            'teacher' => $teachers[array_search($id, array_column($teachers, 'id'))],
        ]);
    }

    public function edit(string $id)
    {
        $title = 'Sistem Sekolah - Penyuntingan Guru';
        $description = 'Memperbarui data Guru';

        return view('teachers.edit', compact('title', 'description'));
    }

    public function update(string $id)
    {
        return 'Melakukan perubahan data Guru';
    }

    public function destroy(string $id)
    {
        return 'Menghapus data Guru';
    }
}
