<?php

namespace Database\Seeders;

use App\Models\PlacementLocation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlacementLocationSeeder extends Seeder
{
    public function run(): void
    {
        PlacementLocation::factory()->pl1()->create();
        PlacementLocation::factory()->pl2()->create();
    }
}
