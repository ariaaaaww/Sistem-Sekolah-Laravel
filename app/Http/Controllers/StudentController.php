<?php

namespace App\Http\Controllers;

use App\Http\Requests\Student\StoreRequest;
use App\Http\Requests\Student\UpdateRequest;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $title = 'Sistem Sekolah - Direktori Siswa';
        $description = 'Menampilkan daftar siswa yang terdaftar di sekolah';
        $students = Student::select('id', 'nis', 'name', 'gender', 'class', 'major')->get();

        return view(
            'students.index',
            [
                'title' => $title,
                'description' => $description,
                'students' => $students,
            ]
        );
    }

    public function create()
    {
        $title = 'Sistem Sekolah - Registrasi Siswa';
        $description = 'Menambahkan data siswa baru';

        return view('students.create', compact('title', 'description'));
    }

    public function store(StoreRequest $request)
    {
        // Validasi data yang diterima dari form
        $validatedRequest = $request->validated();

        // Tambah data siswa baru ke database
        Student::create($validatedRequest);

        return redirect()->route('students.index')->with('success', 'Siswa berhasil ditambahkan.');
    }

    public function show(Student $student)
    {
        $title = 'Sistem Sekolah - Rincian Siswa';
        $description = 'Menampilkan detail data siswa';

        return view('students.show', [
            'title' => $title,
            'description' => $description,
            'student' => $student,
        ]);
    }

    public function edit(Student $student)
    {
        $title = 'Sistem Sekolah - Penyuntingan Siswa';
        $description = 'Memperbarui data siswa';

        return view('students.edit', compact('title', 'description', 'student'));
    }

    public function update(Student $student, UpdateRequest $request)
    {
        // Validasi data yang diterima dari form
        $validatedRequest = $request->validated();

        $student->update($validatedRequest);

        return redirect()->route('students.index')->with('success', 'Siswa berhasil diperbarui.');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Data siswa berhasil dihapus.');
    }
}
