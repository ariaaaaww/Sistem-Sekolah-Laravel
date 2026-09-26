<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userTeacherEmail = 'teacher@ski.sch.id';
        $userStudentEmail = 'student@ski.sch.id';
        $userAdminEmail = 'admin@ski.sch.id';

        // User Teacher
        User::updateOrCreate(
            ['email' => $userTeacherEmail],
            [
                'name' => 'Teacher',
                // Cara hash pakai bcrypt() atau bisa juga pakai Hash::make()
                'password' => bcrypt('password'),
                'role' => 'teacher',
            ]
        );

        // User Student
        User::updateOrCreate(
            ['email' => $userStudentEmail],
            [
                'name' => 'Arianto',
                // Cara hash pakai bcrypt() atau bisa juga pakai Hash::make()
                'password' => bcrypt('password'),
                'role' => 'student',
            ]
        );

        // User Admin
        User::updateOrCreate(
            ['email' => $userAdminEmail],
            [
                'name' => 'Admin',
                // Cara hash pakai bcrypt() atau bisa juga pakai Hash::make()
                'password' => bcrypt('admin'),
                'role' => 'admin',
            ]
        );
    }
}
