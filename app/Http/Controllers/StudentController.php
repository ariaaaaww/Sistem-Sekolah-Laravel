<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $title = "Sistem Sekolah - Direktori Siswa";
        $description = "Menampilkan daftar siswa yang terdaftar di sekolah";
        $students = Student::select('id', 'nis', 'name', 'class', 'major')->get();

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
        $title = "Sistem Sekolah - Registrasi Siswa";
        $description = "Menambahkan data siswa baru";

        return view('students.create', compact('title', 'description'));
    }

    public function store(Request $request)
    {
        Student::create($request->validated());

        return redirect()->route('students.index')->with('success', 'Data siswa berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $title = "Sistem Sekolah - Rincian Siswa";
        $description = "Menampilkan detail data siswa";
        $student = Student::find($id);

        return view('students.show', [
            'title' => $title,
            'description' => $description,
            'student' => $student,
        ]);
    }

    public function edit(Student $student)
    {
        $title = "Sistem Sekolah - Penyuntingan Siswa";
        $description = "Memperbarui data siswa";

        return view(
            'students.edit',
            [
                'title' => $title,
                'description' => $description,
                'student' => $student,
            ]
        );
    }

    public function update(Request $request, Student $student)
    {
        $validatedRequest = $request->validate([
            'nis' => ['required', 'string', 'max:4', 'unique:students,nis,' . $student->id],
            'name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'in:Laki-laki,Perempuan'],
            'class' => ['required', 'string', 'max:50'],
            'major' => ['required', 'string', 'in:TKJ,AKL,BiD'],
        ]);

        $student->update($validatedRequest);

        return redirect()->route('students.index')->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Data siswa berhasil dihapus.');
    }

}
