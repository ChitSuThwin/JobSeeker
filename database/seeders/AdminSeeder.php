<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $faker = Factory::create();
        // $faker->url
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => password_hash('admin123', PASSWORD_BCRYPT),
        ]);
    }
}
