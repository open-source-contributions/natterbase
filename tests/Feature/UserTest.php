<?php
/**
 * Created by PhpStorm.
 * User: Djunehor
 * Date: 3/5/2019
 * Time: 7:29 PM
 */

namespace Tests\Feature;



use Faker\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Tests\TestCase;

class UserTest extends TestCase {
	public function testSignup()
	{
		$faker = Factory::create();

		$payload = [
			'username' => $faker->name,
			'email' => $faker->email,
			'first_name' => $faker->firstName,
			'last_name' => $faker->lastName,
			'password' => Hash::make(12345),
		];
		$response = $this->post('signup', $payload);

		$response->assertStatus(200);
	}

	public function testLogin()
	{
		$faker = Factory::create();;

		$payload = [
			'email' => 'djunehor@gmail.com',
			'password' => 'samuel',
		];
		$response = $this->post('login', $payload);

		$response->assertStatus(200);
	}
}