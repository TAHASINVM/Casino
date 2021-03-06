<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,10) as $value){
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->email,
                'mobile' => $faker->numerify('##########'),
                'password' => $faker->numerify('#####'),
            ]);
        }
    }
}
