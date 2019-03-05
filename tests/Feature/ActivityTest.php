<?php
/**
 * Created by PhpStorm.
 * User: Djunehor
 * Date: 3/5/2019
 * Time: 7:28 PM
 */

namespace Tests\Feature;


use Tests\TestCase;

class ActivityTest extends  TestCase {

	public function testGetActivities()
	{
		$response = $this->get('countries');

		$response->assertStatus(200);
	}
}