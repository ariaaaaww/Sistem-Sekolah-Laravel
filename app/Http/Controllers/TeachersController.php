<?php

namespace App\Http\Controllers;

use App\Http\Requests\Teacher\StoreRequest;
use App\Http\Requests\Teacher\UpdateRequest;
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

    public function show(Teacher $teacher)
    {
        $title = 'Sistem Sekolah - Rincian Guru';
        $description = 'Menampilkan detail data Guru';

        return view('teachers.show', [
            'title' => $title,
            'description' => $description,
            'teacher' => $teacher,
        ]);
    }

    public function edit(Teacher $teacher)
    {
        $title = 'Sistem Sekolah - Penyuntingan Guru';
        $description = 'Memperbarui data Guru';

        return view('teachers.edit', [
            'title' => $title,
            'description' => $description,
            'teacher' => $teacher,
        ]);
    }

    public function update(Teacher $teacher, UpdateRequest $request)
    {
        $validatedRequest = $request->validated();
        $teacher->update($validatedRequest);

        return redirect()->route('teachers.index')->with('success', 'Guru berhasil diperbarui.');
    }

    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect()->route('teachers.index')->with('success', 'Guru berhasil dihapus.');
    }
}
