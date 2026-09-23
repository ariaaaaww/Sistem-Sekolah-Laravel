<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Untuk menjalankan seeder secara spesifik, gunakan perintah: php artisan db:seed --class=StudentSeeder

        // Real Data
        $students = [
            [
                'nis' => '7744',
                'name' => 'Arianto Widodo Putro',
                'gender' => 'Laki-laki',
                'class' => 'XII TKJ 1',
                'major' => 'TKJ',
            ],
            [
                'nis' => '7772',
                'name' => 'Vincent William Misel',
                'gender' => 'Laki-laki',
                'class' => 'XII TKJ 1',
                'major' => 'TKJ',
            ],
            [
                'nis' => '7771',
                'name' => 'Vido Faresky',
                'gender' => 'Laki-laki',
                'class' => 'XII TKJ 1',
                'major' => 'TKJ',
            ],
            [
                'nis' => '7756',
                'name' => 'Edward Cornalius',
                'gender' => 'Laki-laki',
                'class' => 'XII TKJ 1',
                'major' => 'TKJ',
            ],
            [
                'nis' => '7799',
                'name' => 'Jovan Albert William',
                'gender' => 'Laki-laki',
                'class' => 'XII TKJ 3',
                'major' => 'TKJ',
            ],
            [
                'nis' => '1001',
                'name' => 'Andi Haryanto',
                'gender' => 'Laki-laki',
                'class' => 'XII TKJ 1',
                'major' => 'TKJ'
            ],
            [
                'nis' => '1002',
                'name' => 'Budi Santoso',
                'gender' => 'Laki-laki',
                'class' => 'XII TKJ 1',
                'major' => 'TKJ'
            ],
            [
                'nis' => '1003',
                'name' => 'Citra Dewi',
                'gender' => 'Perempuan',
                'class' => 'XII TKJ 1',
                'major' => 'TKJ'
            ],
            [
                'nis' => '1010',
                'name' => 'Charissa Adelaine Limanto',
                'gender' => 'Perempuan',
                'class' => 'XII A',
                'major' => 'IPA'
            ]
        ];

        Student::upsert($students, ['nis'], ['name', 'gender', 'class', 'major']);


        // Fake Data
        Student::factory()->count(11)->create();
    }
}
