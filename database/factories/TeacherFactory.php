<?php

namespace Database\Factories;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeacherFactory extends Factory
{
    protected $model = Teacher::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'teacher_id' => $this->faker->unique()->numerify('TCH###'),
            'department' => $this->faker->randomElement(['Computer Science', 'Mathematics', 'Physics']),
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'dob' => $this->faker->date(),
            'mobile' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'address' => $this->faker->address,
            'qualification' => $this->faker->randomElement(['PhD', 'MSc', 'BSc']),
            'user_id' => null,
        ];
    }
}
