<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Habit;
use App\Models\User;

class HabitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Fetch the first user
        $user = User::first();

        // Create a few habits for the user
        $user->habits()->createMany([
            ['name' => 'Habit 1', 'description' => 'Description for Habit 1', 'habit_type' => '21', 'days_tracked' => 5],
            ['name' => 'Habit 2', 'description' => 'Description for Habit 2', 'habit_type' => '66', 'days_tracked' => 3],
            // Add more habits as needed
        ]);
    }
}
