<?php

namespace Database\Seeders;

use App\Models\Major;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Seeder;

class MajorSeeder extends Seeder
{
    use HasFactory;

    public function run(): void
    {
        Major::factory()->count(3)->create();
    }
}
