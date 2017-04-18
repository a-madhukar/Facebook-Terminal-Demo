<?php 

namespace App\Services\Facebook; 

use Facebook\Facebook; 

class FacebookImplementation implements FacebookInterface
{

	public $fb; 


	public function __construct()
	{
		$this->fb = new Facebook([
    		'app_id' => config('services.facebook.client_id'),
    		'app_secret' => config('services.facebook.client_secret'),
    		'default_graph_version' => 'v2.8',
		]);
	}



	public function displayUserPosts($user = null)
	{
		$user = $user ?: auth()->user(); 
		$response = $this->fb->get("/me/feed", $user->access_token); 
		// return "hello"; 
		// dd($response->getBody()); 
		return collect(json_decode($response->getBody())->data); 
	}

}