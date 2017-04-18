<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Services\Facebook\FacebookInterface as Facebook;  

class FacebookTest extends TestCase
{
    
	/**
	 * @test
	 * @return [type] [description]
	 */
	public function check_if_posts_are_being_returned()
	{
		// $this->actingAs(App\User::first());

		$this->assertTrue(true);  
	}

}
