<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Laravel\Socialite\Facades\Socialite;


class AuthController extends Controller
{
    public function login(Request $request)
{
    $token = $request->input('access_token');

    if (!$token) {
        return response()->json(['error' => 'Access token is missing'], 400);
    }

    $providerUser = Socialite::driver('google')->userFromToken($token);


    $user = User::where('provider_id', $providerUser->id)->first();

    if($user == null){
        $user = User::create([
            'provider_id' => $providerUser->getId(),
            'name' => $providerUser->name,
            'email' => $providerUser->email,
            'npm' => strtok($providerUser->email, '@'),
            'role' => 2,
            'picture' => $providerUser->avatar
        ]);
    }

    $login = $user->createToken('login')->plainTextToken;
    return response()->json([
        'user' => $providerUser,
        'login_token' => $login,
    ]);
    
}

    

    public function Callback()
    {
        $user = Socialite::driver('google')->user();

        dd($user);
    }
}
