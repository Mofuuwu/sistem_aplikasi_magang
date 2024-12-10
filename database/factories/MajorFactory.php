<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Major>
 */
class MajorFactory extends Factory
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
    public function m1() {
        return $this->state([
            'id' => '1',
            'name' => 'Pengembangan Perangkat Lunak Dan Game'
        ]);
    }
    public function m2() {
        return $this->state([
            'id' => '2',
            'name' => 'Desain Komunikasi Dan Visual'
        ]);
    }
    public function m3() {
        return $this->state([
            'id' => '3',
            'name' => 'Teknik Komputer Dan Jaringan'
        ]);
    }
}
