<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use Auth;
use App\User;

class SocialController extends Controller
{
    public function redirect($provider)
    {
    	return Socialite::driver($provider)->redirect();
    }

    public function Callback($provider)
    {
        $userSocial 	=   Socialite::driver($provider)->stateless()->user();
        $users       	=   User::where(['email' => $userSocial->getEmail()])->first();

        if($users){
            Auth::login($users);
            return redirect('/home');
        }else{

            $user = User::create([
                'name'          => $userSocial->getName(),
                'email'         => $userSocial->getEmail(),
                'image'         => $userSocial->getAvatar(),
                'provider_id'   => $userSocial->getId(),
                'provider'      => $provider,
            ]);


            return redirect('/home');
        }
    }


    public function twitterRedirect()
    {
    	return Socialite::driver('twitter')->redirect();
    }

        public function facebookRedirect()
    {
    	return Socialite::driver('facebook')->redirect();
    }


    public function TwitterCallback()
    {
        $twitterSocial =   Socialite::driver('twitter')->user();
        $users       =   User::where(['email' => $twitterSocial->getEmail()])->first();

        if($users){
            Auth::login($users);
            return redirect('/home');
        }else{

            $user = User::firstOrCreate([
                'name'          => $twitterSocial->getName(),
                'email'         => $twitterSocial->getEmail(),
                'image'         => $twitterSocial->getAvatar(),
                'provider_id'   => $twitterSocial->getId(),
                'provider'      => 'twitter',
            ]);

            return redirect()->route('dashboard');
        }
    }

        public function FacebookCallback()
    {
        $facebookSocial =   Socialite::driver('facebook')->user();
        $users       =   User::where(['email' => $facebookSocial->getEmail()])->first();

        if($users){
            Auth::login($users);
            return redirect('/home');
        }else{

            $user = User::firstOrCreate([
                'name'          => $facebookSocial->getName(),
                'email'         => $facebookSocial->getEmail(),
                'image'         => $facebookSocial->getAvatar(),
                'provider_id'   => $facebookSocial->getId(),
                'provider'      => 'facebook',
            ]);

            return redirect()->route('dashboard');
        }
    }

}
