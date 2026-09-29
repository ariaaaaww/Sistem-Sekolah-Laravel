<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

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
                'class_id' => 'XII TKJ 1',
                'major_id' => 'TKJ',
            ],
            [
                'nis' => '7772',
                'name' => 'Vincent William',
                'gender' => 'Laki-laki',
                'class_id' => 'XII TKJ 1',
                'major_id' => 'TKJ',
            ],
            [
                'nis' => '7771',
                'name' => 'Vido Faresky',
                'gender' => 'Laki-laki',
                'class_id' => 'XII TKJ 1',
                'major_id' => 'TKJ',
            ],
            [
                'nis' => '7756',
                'name' => 'Edward Cornelius',
                'gender' => 'Laki-laki',
                'class_id' => 'XII TKJ 1',
                'major_id' => 'TKJ',
            ],
            [
                'nis' => '7799',
                'name' => 'Jovan Albert William',
                'gender' => 'Laki-laki',
                'class_id' => 'XII TKJ 3',
                'major_id' => 'TKJ',
            ],
            [
                'nis' => '1003',
                'name' => 'Citra Dewi',
                'gender' => 'Perempuan',
                'class_id' => 'XII TKJ 1',
                'major_id' => 'TKJ',
            ],
            [
                'nis' => '1010',
                'name' => 'Charissa Adelaine Limanto',
                'gender' => 'Perempuan',
                'class_id' => 'XII A',
                'major_id' => 'IPA',
            ],
        ];

        Student::upsert($students, ['nis'], ['name', 'gender', 'class_id', 'major_id']);

        // Fake Data
        Student::factory()->count(11)->create();
    }
}
