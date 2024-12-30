<?php

namespace Database\Seeders;

use App\Models\Rule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RuleSeeder extends Seeder
{
    public function run(): void
    {
        Rule::factory()->gr1()->create();
        Rule::factory()->gr2()->create();
        Rule::factory()->gr3()->create();
        Rule::factory()->ur1()->create();
        Rule::factory()->ur2()->create();
        Rule::factory()->ur3()->create();
        Rule::factory()->ur4()->create();
    }
}
