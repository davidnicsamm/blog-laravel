<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        \App\Models\User::factory()->count(29)->create();

        \App\Models\User::create([
            'name' => 'David Nicolas Sammartino',
            'email' => 'davidnicsamm@gmail.com',
            'password' => bcrypt('1234')
        ]);
    }
}
