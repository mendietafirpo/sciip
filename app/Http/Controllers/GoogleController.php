<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\user;
use Illuminate\Support\Facades\Auth;

class GoogleController extends Controller
{
    public function redirectToGoogle(){

        return Socialite::driver('google')->stateless()->redirect();
    }

    public function handleGoogleCallback(){

                    $user = Socialite::driver('google')->stateless()->user();

        try {
            $user = Socialite::driver('google')->user();
            $finduser = User::where('google_id',$user->id)->first();

            if($finduser){

                Auth::login($finduser);
                return redirect()->intended('dashboard');

            } else {
                $newuser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'admin' => 3,
                    'google_id' => $user->id,
                    'password' => encrypt('mypassword'),
                    'current_team_id' => 0
                ]);
                Auth::login($newuser);

                    return redirect()->intended('/');

            }

        } catch (Exception $e){
            dd($e->getMessage());
        }


    }
}
