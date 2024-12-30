<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\School>
 */
class SchoolFactory extends Factory
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
    public function s1() {
        return $this->state([
            'id' => '1',
            'name' => 'SMK Negeri 1 Purwokerto',
            'address' => 'Jl. Raya Purwokerto Timur',
            'email' => 'smkn1pwt@gmail.com',
            'phone_number' => '091828171827'
        ]);
    }
    public function s2() {
        return $this->state([
            'id' => '2',
            'name' => 'SMK Negeri 1 Puwbalingga',
            'address' => 'Jl. Raya Purbalingga Selatan',
            'email' => 'smkn1pbg@gmail.com',
            'phone_number' => '018182718262'
        ]);
    }
}
