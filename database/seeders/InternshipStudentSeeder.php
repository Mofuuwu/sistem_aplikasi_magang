<?php

namespace Database\Seeders;

use App\Models\InternshipStudent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InternshipStudentSeeder extends Seeder
{
    public function run(): void
    {
        InternshipStudent::factory()->is1()->create();
        InternshipStudent::factory()->is2()->create();
        InternshipStudent::factory()->is3()->create();
    }
}
