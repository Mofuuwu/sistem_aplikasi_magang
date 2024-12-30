<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rule>
 */
class RuleFactory extends Factory
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
    public function gr1() {
        return $this->state([
            'type' => 'general',
            'description' => 'Kegiatan Pkl Dimulai Pukul 07.00 dan Selesai Pukul 15.00',
        ]);
    }
    public function gr2() {
        return $this->state([
            'type' => 'general',
            'description' => 'Mengenakan Seragam Sekolah',
        ]);
    }
    public function gr3() {
        return $this->state([
            'type' => 'general',
            'description' => 'Jam Istirahat Pukul 12.00',
        ]);
    }
    public function ur1() {
        return $this->state([
            'type' => 'unit',
            'description' => 'Membawa Laptop Sendiri',
            'work_unit_id' => '1'
        ]);
    }
    public function ur2() {
        return $this->state([
            'type' => 'unit',
            'description' => 'Melaksanakan Tugas Dari Pembimbing',
            'work_unit_id' => '1'
        ]);
    }
    public function ur3() {
        return $this->state([
            'type' => 'unit',
            'description' => 'Berangkat Pada Hari Senin - Jumat',
            'work_unit_id' => '2'
        ]);
    }
    public function ur4() {
        return $this->state([
            'type' => 'unit',
            'description' => 'Berangkat Pada Hari Senin - Sabtu',
            'work_unit_id' => '1'
        ]);
    }
}
