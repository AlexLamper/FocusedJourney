<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Topic;

class TopicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Topic::create([
            'title' => 'Structure of the Bible',
            'description' => 'Learn about the structure of the Bible.',
        ]);

        // Add more topics as needed
    }
}
