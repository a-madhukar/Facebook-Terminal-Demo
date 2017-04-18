<?php 

namespace App\Services\Facebook; 

interface FacebookInterface
{

	public function displayUserPosts(); 
	public function postToUserTimeline($message); 

}