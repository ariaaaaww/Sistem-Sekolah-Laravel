<?php

namespace Database\Seeders;

use App\Models\SchoolClass;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Seeder;

class ClassSeeder extends Seeder
{
    use HasFactory;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SchoolClass::factory()->count(15)->create();
    }
}
