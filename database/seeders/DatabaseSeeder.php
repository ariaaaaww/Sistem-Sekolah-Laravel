<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Untuk menjalankan secara menyeluruh, gunakan perintah: php artisan db:seed
        $this->call([
            StudentSeeder::class,
        ]);
    }
}
