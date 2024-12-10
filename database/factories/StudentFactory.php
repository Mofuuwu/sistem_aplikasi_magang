<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
        ];
    }
    public function student1() {
        return $this->state([
            'id' => '1',
            'user_id' => '1',
            'class' => '12',
            'major_id' => '1',
            'school_id' => '1',
            'phone_number' => '082716272616',
            'address' => 'Jl. Raya Kedungbanteng',
            'profile_photo' => '202394829',
            'father_name' => 'Father',
            'father_job' => 'FatherJob',
            'mother_name' => 'Mother',
            'mother_job' => 'MotherJob',
            'is_active' => '1',
        ]);
    }
}
