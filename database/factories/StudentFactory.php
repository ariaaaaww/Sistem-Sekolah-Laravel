<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends Factory<Student>
 */
class StudentFactory extends Factory
{
    protected $model = Student::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nis' => $this->faker->unique()->numerify('####'),
            'name' => $this->faker->name(),
            'gender' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            'class' => $this->faker->randomElement(['XII TKJ 1', 'XII TKJ 2', 'XII TKJ 3', 'XII AKL 1', 'XII AKL 2', 'XII BiD 1', 'XII BiD 2']),
            'major' => $this->faker->randomElement(['TKJ', 'AKL', 'BiD']),
        ];
    }
}
