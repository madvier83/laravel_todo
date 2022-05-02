<?php

namespace Database\Seeders;

use App\Models\Todos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Todos::create([
            'task' => 'Your Task 1',
        ]);
        Todos::create([
            'task' => 'Your Task 2',
        ]);
        Todos::create([
            'task' => 'Your Task 3',
        ]);
    }
}
