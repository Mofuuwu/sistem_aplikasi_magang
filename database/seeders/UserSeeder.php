<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->userOne()->create();
        User::factory()->userTwo()->create();
        User::factory()->userThree()->create();
        User::factory()->userFour()->create();
        User::factory()->userFive()->create();
    }
}
