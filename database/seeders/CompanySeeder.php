<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = [];
        $faker = Factory::create();
        foreach (range(1, 10) as $index) {
            $company = [
                'name' => $faker->name(),
                'address' => $faker->address(),
                'website' => $faker->url(),
                'email' => $faker->email(),
            ];
            $companies[] = $company;
        }
        DB::table('companies')->truncate();
        DB::table('companies')->insert($companies);
    }
}
