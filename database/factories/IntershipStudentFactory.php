<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\IntershipStudent>
 */
class IntershipStudentFactory extends Factory
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
    public function is1() {
        return $this->state([
            'id' => '1',
            'student_id' => '1',
            'mentor_id' => '1',
            'work_unit_id' => '1',
            'start_at' => '2024-12-1',
            'end_at' => '2025-03-10',
        ]);
    }
}
