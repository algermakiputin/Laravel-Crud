<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Persons;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
    	for ($i = 0; $i < 20; $i++) {
            DB::transaction(function() use($faker) {
                $uid = User::create([
                    'name' => $faker->firstName,
                    'email' => $faker->email,
                    'password' => Hash::make('test'),
                    'role_id' => 1
                ])->id;

                Persons::create([
                    'first_name' => $faker->firstName,
                    'last_name' => $faker->lastName,
                    'gender' => $faker->randomElement(['Male', 'Female']),
                    'birthdate' => '1995-10-10',
                    'marital_status' => $faker->randomElement(['Single', 'Married']),
                    'user_id' => $uid
                ]);
            });
    	}
    }
}
