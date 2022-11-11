<?php

namespace Database\Seeders;

use App\Models\Categories;
use App\Models\Jobs;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for($i=1;$i<=5;$i++){
            Categories::create([
                'name' => 'Category-'.$i
            ]);
        }

        for($i=1;$i<=40;$i++){
            Jobs::create([
                'categories_id' => rand(1,5),
                'title' => "This is a job $i",
                'salary' => '450000',
                'job_description' => $faker->text,
                'job_requirement' => $faker->text,
                'description' => $faker->text,
                'end_date' => Carbon::tomorrow(),
                'is_display' => '1'
            ]);
        }
        
    }
}
