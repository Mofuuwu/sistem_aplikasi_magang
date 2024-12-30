<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PlacementLocation>
 */
class PlacementLocationFactory extends Factory
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
    public function pl1() {
        return $this->state([
            'id' => '1',
            'name' => 'Gedung 1',
            'address' => 'Jl. Raya Kedungbanteng'
        ]);
    }
    public function pl2() {
        return $this->state([
            'id' => '2',
            'name' => 'Gedung 2',
            'address' => 'Jl. Raya Keniten'
        ]);
    }
}
