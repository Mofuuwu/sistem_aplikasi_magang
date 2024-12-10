<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WorkUnit>
 */
class WorkUnitFactory extends Factory
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
    public function unit1() {
        return $this->state([
            'id' => '1',
            'name' => 'L3PM',
            'placement_location_id' => '1'
        ]);
    }
    public function unit2() {
        return $this->state([
            'id' => '2',
            'name' => 'Humas',
            'placement_location_id' => '2'
        ]);
    }
}
