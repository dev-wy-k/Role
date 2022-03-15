<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirect(){
        return Socialite::driver('google')->redirect();
    }

    public function callback(){

        $sociallite = Socialite::driver('google')->stateless()->user();

        $isUser = User::where("google_id", $sociallite->id)->first() ;

        if(isset($isUser)){

            Auth::login($isUser) ;

        }else{
            $user = new User();
            $user->name = $sociallite->name ;
            $user->email = $sociallite->email ;
            $user->google_id = $sociallite->id ;
            $user->password = Hash::make("password") ;

            $user->save() ;
            Auth::login($user) ;
        }

        return redirect()->route('home');

    }
}
