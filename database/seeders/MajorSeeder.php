<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Seeder;

class MajorSeeder extends Seeder
{
    // Video 10 06:24
    use HasFactory;
    public function run(): void
    {
        Major::factory()->create()->count(3);
    }
}
