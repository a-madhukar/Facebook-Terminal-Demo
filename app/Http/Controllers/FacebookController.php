<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Facebook\FacebookInterface as Facebook; 

class FacebookController extends Controller
{

    public function displayUserPosts(Facebook $fb)
    {
    	dd($fb->displayUserPosts()); 
    }
}
