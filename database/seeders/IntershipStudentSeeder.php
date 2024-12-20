<?php

namespace Database\Seeders;

use App\Models\IntershipStudent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IntershipStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        IntershipStudent::factory()->is1()->create();
        IntershipStudent::factory()->is2()->create();
        IntershipStudent::factory()->is3()->create();
    }
}
