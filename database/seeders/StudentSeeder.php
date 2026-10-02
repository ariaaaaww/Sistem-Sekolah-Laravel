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
        // Fake Data
        Student::factory()->count(10)->create();
    }
}
