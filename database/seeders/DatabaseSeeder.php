<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use App\Models\Category;
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

        /* User::factory()->create([
            'id' => 1,
            'name' => 'Test Author',
            'email' => 'test@example.com',
            'password' => bcrypt('pass123!'),
        ]); */

        //Post::factory(5)->create();

        $categories = ['Travel', 'Sports', 'Science', 'Music', 'Animals', 'Food', 'IT']; 
        foreach ($categories as $category) {
            
            Category::factory()->create([
                'category' => $category,
            ]);

        };
    }
}
