<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class UserSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [];
        $faker = Factory::create();
        for ($i = 0; $i < 10; $i++) {
            $user = [
                'name' => $faker->name(),
                'email' => $faker->email(),
                'password' => 'password',
            ];
            $users[] = $user;
        }
        DB::table('users')->truncate();
        DB::table('users')->insert($users);
    }
}
