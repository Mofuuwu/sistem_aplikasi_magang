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
            'profile_photo' => '1734320019_675f9f936ea27.jpg',
            'father_name' => 'Father',
            'father_job' => 'FatherJob',
            'mother_name' => 'Mother',
            'mother_job' => 'MotherJob',
            'is_active' => '1',
        ]);
    }
    public function student2() {
        return $this->state([
            'id' => '2',
            'user_id' => '4',
            'class' => '12',
            'major_id' => '1',
            'school_id' => '1',
            'phone_number' => '082716272616',
            'address' => 'Jl. Raya Pancurawis',
            'profile_photo' => '1734403498_6760e5aa62163.jpg',
            'father_name' => 'Father',
            'father_job' => 'FatherJob',
            'mother_name' => 'Mother',
            'mother_job' => 'MotherJob',
            'is_active' => '1',
        ]);
    }
    public function student3() {
        return $this->state([
            'id' => '3',
            'user_id' => '5',
            'class' => '12',
            'major_id' => '1',
            'school_id' => '1',
            'phone_number' => '082716272616',
            'address' => 'Jl. Raya Kebumen',
            'profile_photo' => '1734403498_6760e5aa62163.jpg',
            'father_name' => 'Father',
            'father_job' => 'FatherJob',
            'mother_name' => 'Mother',
            'mother_job' => 'MotherJob',
            'is_active' => '1',
        ]);
    }
}
