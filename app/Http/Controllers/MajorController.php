<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MajorController extends Controller
{
    public function index()
    {
        $title = "Sistem Sekolah - Direktori Jurusan";
        $description = "Menampilkan daftar Jurusan yang tersedia di sekolah";
        $majors = [
            [
                'id' => 1,
                'code' => 'AKL',
                'name' => 'Akuntansi dan Keuangan Lembaga',
                'description' => 'Program keahlian yang membekali murid dengan kompetensi pencatatan dan pelaporan keuangan.',
            ],
            [
                'id' => 2,
                'code' => 'TKJ',
                'name' => 'Teknik Komputer dan Jaringan',
                'description' => 'Program keahlian yang membekali murid dengan kompetensi instalasi, konfigurasi, dan pemeliharaan jaringan komputer.',
            ],
            [
                'id' => 3,
                'code' => 'BiD',
                'name' => 'Bisnis Digital',
                'description' => 'Program keahlian yang membekali murid dengan kompetensi pemasaran dan pengelolaan bisnis berbasis digital.',
            ],
        ];


        return view(
            'majors.index',
            [
                'title' => $title,
                'description' => $description,
                'majors' => $majors,
            ]
        );
    }

    public function create()
    {
        $title = "Sistem Sekolah - Registrasi Jurusan";
        $description = "Menambahkan data Jurusan baru";

        return view('majors.create', compact('title', 'description'));
    }

    public function store()
    {
        return "Melakukan penambahan data Jurusan";
    }

    public function show(string $id)
    {
        $title = "Sistem Sekolah - Rincian Jurusan";
        $description = "Menampilkan detail Jurusan";

        $allMajors = [
            [
                'id' => 1,
                'code' => 'AKL',
                'name' => 'Akuntansi dan Keuangan Lembaga',
                'description' => 'Program keahlian yang membekali murid dengan kompetensi pencatatan dan pelaporan keuangan.',
            ],
            [
                'id' => 2,
                'code' => 'TKJ',
                'name' => 'Teknik Komputer dan Jaringan',
                'description' => 'Program keahlian yang membekali murid dengan kompetensi instalasi, konfigurasi, dan pemeliharaan jaringan komputer.',
            ],
            [
                'id' => 3,
                'code' => 'BiD',
                'name' => 'Bisnis Digital',
                'description' => 'Program keahlian yang membekali murid dengan kompetensi pemasaran dan pengelolaan bisnis berbasis digital.',
            ],
        ];

        $major = collect($allMajors)->firstWhere('id', (int) $id);

        if (!$major) {
            abort(404);
        }

        return view('majors.show', [
            'title' => $title,
            'description' => $description,
            'major' => $major, // Kirim sebagai $major (tunggal)
        ]);
    }

    public function edit(string $id)
    {
        $title = "Sistem Sekolah - Penyuntingan Jurusan";
        $description = "Memperbarui data Jurusan";

        return view('majors.edit', compact('title', 'description'));
    }

    public function update(string $id)
    {
        return "Melakukan perubahan data Jurusan";
    }

    public function destroy(string $id)
    {
        return "Menghapus data Jurusan";
    }

}
