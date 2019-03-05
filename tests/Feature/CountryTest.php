<?php

namespace Tests\Feature;

use Djunehor\Country;
use Illuminate\Support\Str;
use Tests\TestCase;

class CountryTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetCountries()
    {
        $response = $this->get('countries');

        $response->assertStatus(200);
    }


	public function testDeleteCountry()
	{
		$country = Country::query()->firstOrFail();
		$response = $this->delete('countries/'.$country->id);

		$response->assertStatus(200);
	}

	public function testUpdateCountry()
	{
		$country = Country::query()->firstOrFail();
		$response = $this->put('countries/'.$country->id,
			['name' => Str::random(8), 'continent' => Str::random(12)]
		);

		$response->assertStatus(200);
	}
}
