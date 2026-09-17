<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $title = 'Sistem Sekolah - Direktori Siswa';
        $description = 'Menampilkan daftar siswa yang terdaftar di sekolah';
        // $students = Student::get(); // Mengambil semua data siswa dari database
        // $students = Student::where('id', '<', 2)->get(); // Mengambil data yang di filter berdasarkan kondisi tertentu, misalnya id < 2
        $students = Student::select('id', 'nis', 'name', 'class', 'major')->get(); // Mengambil data tertentu dari database, misalnya hanya kolom nis, name, class, dan major

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

    public function store(Request $request)
    {
        // Kirim atau proses inputan pengguna ke database (Dengan Mass Assign) -> Direkomendasi

        // Validasi Input Pengguna
        $validatedRequest = $request->validate([
            'nis' => ['required', 'string', 'size:4', 'unique:students,nis'],
            'name' => ['required', 'string', 'max:255'],
            'class' => ['required', 'string', 'max:255'],
            'major' => ['required', 'string', 'in:AKL,BiD,TKJ'],
        ]);

        Student::create($validatedRequest);

        // Kirim atau proses inputan pengguna ke database (Tanpa Mass Assign) -> Tidak terlalu  direkomendasikan

        // $request->validate([
        //     'nis' => ['required', 'string', 'unique:students,nis'],
        //     'name' => ['required', 'string', 'max:255'],
        //     'class' => ['required', 'string', 'max:255'],
        //     'major' => ['required', 'string', 'in:AKL,BiD,TKJ'],
        // ]);

        // $student = new Student;
        // $student->nis = $request->input('nis');
        // $student->name = $request->input('name');
        // $student->class = $request->input('class');
        // $student->major = $request->input('major');
        // $student->save();

        // Handle jika suksek
        return redirect()->route('students.index')->with('success', 'Data siswa berhasil ditambahkan.');
    }

    public function show(Student $student)
    {
        $title = 'Sistem Sekolah - Rincian Siswa';
        $description = 'Menampilkan detail data siswa';
        $student = Student::find($student->id); // Mengambil data siswa berdasarkan id dari database

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

        return view('students.edit', compact('title', 'description'));
    }

    public function update(Student $student)
    {
        return 'Melakukan perubahan data siswa';
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Data siswa berhasil dihapus.');
    }
}
