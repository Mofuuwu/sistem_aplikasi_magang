<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Task::factory()->t1b()->create();
        Task::factory()->t2b()->create();
        Task::factory()->t3b()->create();
        Task::factory()->t1s()->create();
        Task::factory()->t2s()->create();
    }
}
