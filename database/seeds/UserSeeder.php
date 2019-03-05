<?php

use Djunehor\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    $faker = Factory::create();
	    User::create([
		    'username' => $faker->name,
		    'email' => $faker->email,
		    'first_name' => $faker->firstName,
		    'last_name' => $faker->lastName,
		    'password' => Hash::make('samuel'),
	    ]);
    }
}
