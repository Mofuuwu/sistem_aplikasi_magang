<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call(UserSeeder::class);
        $this->call(WorkUnitSeeder::class);
        $this->call(PlacementLocationSeeder::class);
        $this->call(MentorSeeder::class);
        $this->call(InternshipStudentSeeder::class);
        $this->call(MajorSeeder::class);
        $this->call(SchoolSeeder::class);
        $this->call(StudentSeeder::class);
        $this->call(RuleSeeder::class);
        $this->call(TaskSeeder::class);
    }
}
