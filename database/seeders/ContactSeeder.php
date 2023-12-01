<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contacts = [];
        $faker = Factory::create();
        foreach (range(1, 10) as $index) {
            $contact = [
                'firstname' => $faker->firstName(),
                'lastname' => $faker->lastName(),
                'email' => $faker->email(),
                'phone' => $faker->phoneNumber(),
                'address' => $faker->address(),
                'company_id' => rand(1, 10),
            ];
            $contacts[] = $contact;
        }
        // DB::table('contacts')->truncate();
        DB::table('contacts')->insert($contacts);
    }
}
