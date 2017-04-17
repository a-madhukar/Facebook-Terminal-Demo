<?php

namespace App\Http\Controllers;

use App\User;
use Socialite;
use Facebook\Facebook; 
use Illuminate\Http\Request;

class FacebookAuthController extends Controller
{
     /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')
        ->scopes(['user_posts','public_profile'])
        ->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
    	$user = User::saveFbUser(
    		Socialite::driver('facebook')->user()
    	)->login(); 

    	dd($user); 

  //   	$fb = new Facebook([
  //   		'app_id' => config('services.facebook.client_id'),
  //   		'app_secret' => config('services.facebook.client_secret'),
  //   		'default_graph_version' => 'v2.8',
		// ]);

		// dump($fb); 

		// $response = $fb->get("/me/feed", $user->token); 

		// dd($response); 

     //    $user = User::handleFBAuth(
     //    	Socialite::driver('facebook')->user()
    	// );

    	// auth()->login($user); 

    	// return redirect()->route('home'); 
    }
}
