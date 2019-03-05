<?php

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    $faker = Factory::create();
	    for($i = 0; $i < 50; $i++) {
		    \Djunehor\Country::create( [
			    'name'      => $faker->name,
			    'continent' => Str::random( 9 ),
		    ] );
	    }
    }
}
