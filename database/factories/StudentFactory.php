<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'student_id' => $this->faker->unique()->numerify('STU###'),
            'department' => $this->faker->randomElement(['Computer Science', 'Mathematics', 'Physics']),
            'year' => $this->faker->numberBetween(1, 4),
            'batch' => $this->faker->randomElement(['A', 'B', 'C']),
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'dob' => $this->faker->date(),
            'mobile' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'register_number' => $this->faker->unique()->numerify('REG###'),
            'user_id' => null, // Set to null or link to a user if needed
        ];
    }
}
