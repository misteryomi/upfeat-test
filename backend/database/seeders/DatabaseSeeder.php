<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Book;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Book::factory(10)->create();


        //Insert default User record
        User::firstOrCreate([
            'name' => 'Yomi Omotoso',
            'email' =>  'yomiomotoso@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
