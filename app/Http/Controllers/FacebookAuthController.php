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
        ->scopes(['user_posts','public_profile','publish_actions'])
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
    	
    	return redirect()->route('home'); 
    }
}
