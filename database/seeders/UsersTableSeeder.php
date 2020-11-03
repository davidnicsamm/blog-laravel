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
        //
        factory(App\User::class,31)->create();

        App\User::create([
            'name' => 'David Nicolas Sammartino',
            'email' => 'davidnicsamm@gmail.com',
            'password' => bcrypt('1234')
        ]);
    }
}
