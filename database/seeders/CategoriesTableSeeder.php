<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
         \App\Models\Category::factory()->count(20)->create();
        // \App\Database\Factories\Category::factory()->count(20)->create();

        // factory()->create(App\Models\Category::class,20)->create();
    }
}
