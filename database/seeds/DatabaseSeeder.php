<?php

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
        App\User::create([
            'name' => 'Andres Felipe',
            'email' => 'pruebas@gmail.com',
            'password' => bcrypt('123456')
        ]);
        //factory(App\User::class, 4)->create();
        factory(App\Post::class, 30)->create();
    }
}
