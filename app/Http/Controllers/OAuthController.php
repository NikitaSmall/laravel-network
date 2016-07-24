<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;

class OAuthController extends Controller
{
    public function google_login(Request $request)
    {
    	// get data from request
	    $code = $request->get('code');

	    // get google service
	    $googleService = \OAuth::consumer('Google');

	    // check if code is valid

	    // if code is provided get user data and sign in
	    if ( ! is_null($code))
	    {
	        // This was a callback request from google, get the token
	        $token = $googleService->requestAccessToken($code);

	        // Send a request with it
	        $user = json_decode($googleService->request('https://www.googleapis.com/oauth2/v1/userinfo'), true);

	        $this->registerOrLogin($user);
	        return redirect('/home');
	    }
	    // if not ask for permission first
	    else
	    {
	        // get googleService authorization
	        $url = $googleService->getAuthorizationUri();

	        // return to google login url
	        return redirect((string)$url);
	    }
    }

    protected function registerOrLogin($user)
    {
    	if ($this->isNewUser($user)) {
    		User::create([
    				'name' => $user['name'],
    				'email' => $user['email'],
    				'social_id' => $user['id'],
    				'password' => bcrypt($user['id']),
    				'avatar' => $user['picture'],
    			]);
    	}

    	$inner_user = User::where('social_id', $user['id'])->first();
    	\Auth::login($inner_user);
    }

    protected function isNewUser($user)
    {
    	if (User::where('social_id', $user['id'])->count() > 0) {
    		return false;
    	}

    	if (User::where('email', $user['email'])->count() > 0) {
    		return false;
    	}

    	return true;
    }
}
