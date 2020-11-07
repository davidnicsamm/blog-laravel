<?php

namespace Database\Seeders;

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
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(PostsTableSeeder::class);

        // \App\Models\User::factory(30)->create();
        // \App\Models\Category::factory(20)->create();
        // \App\Models\Tag::factory(10)->create();
        // \App\Models\Post::factory(10)->create();
    }
}
