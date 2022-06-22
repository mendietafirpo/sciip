<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\user;
use Illuminate\Support\Facades\Auth;

class FacebookController extends Controller
{
    public function redirectToFacebook(){

        return Socialite::driver('facebook')->stateless()->redirect();
    }

    public function handleFacebookCallback(){

                    $user = Socialite::driver('facebook')->stateless()->user();

        try {
            $user = Socialite::driver('facebook')->user();
            $finduser = User::where('facebook_id',$user->id)->first();

            if($finduser){

                Auth::login($finduser);
                return redirect()->intended('dashboard');

            } else {
                $newuser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'admin' => 3,
                    'facebook_id' => $user->id,
                    'password' => encrypt('mypassword'),
                    'current_team_id' => 1
                ]);
                Auth::login($newuser);
                return redirect()->intended('/');

            }

        } catch (Exception $e){
            dd($e->getMessage());
        }


    }
}
