<?php

namespace App\Http\Controllers;


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

    return response()->json($providerUser);

    // $user = User::where('provider_id', $providerUser->id)->first();

    // if($user == null){
    //     $user = User::create([
    //         'provider_id' => $providerUser->id,
    //     ]);
    // }

    // // create a token for the user, so they can login
    // $token = $user->createToken(env('APP_NAME'))->accessToken;

    // // return the token for usage
    // return response()->json([
    //     'success' => true,
    //     'token' => $token
    // ]);
}

    

    public function Callback()
    {
        $user = Socialite::driver('google')->user();

        dd($user);
    }
}
