<?php

namespace App\Http\Controllers;

use App\Http\Requests\Student\StoreRequest;
use App\Http\Requests\Student\UpdateRequest;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Sistem Sekolah - Direktori Siswa';
        $description = 'Menampilkan daftar siswa yang terdaftar di sekolah';

        $search = $request->query('search');
        $class = $request->query('class');
        $major = $request->query('major');

        $students = Student::select('id', 'nis', 'name', 'class', 'major')
            ->when($search, function ($query, $search) {
                $query->where(function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%")
                        ->orWhere('nis', 'like', "%{$search}%");
                });

            })
            ->when($class, fn ($query, $class) => $query->where('class', '=', $class))
            ->when($major, fn ($query, $major) => $query->where('major', '=', $major))
            // Menampilkan data dengan jumlah 5 id
            ->paginate(5)
            // Memunculkan data tanpa menghilangkan filter setelah next page
            ->withQueryString();

        $schoolClasses = [
            'X AKL',
            'X BiD',
            'X TKJ 1',
            'X TKJ 2',
            'X TKJ 3',
            'XI AKL',
            'XI BiD',
            'XI TKJ 1',
            'XI TKJ 2',
            'XI TKJ 3',
            'XII AKL',
            'XII BiD',
            'XII TKJ 1',
            'XII TKJ 2',
            'XII TKJ 3',
        ];

        $majors = ['AKL', 'BiD', 'TKJ'];

        return view(
            'students.index',
            [
                'title' => $title,
                'description' => $description,
                'students' => $students,
                'schoolClasses' => $schoolClasses,
                'majors' => $majors,
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
