<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mentor>
 */
class MentorFactory extends Factory
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
    public function mentor1() {
        return $this->state([
            'id' => '1',
            'user_id' => '2',
            'phone_number' => '082718271617',
            'work_unit_id' => '1',
        ]);
    }
}
