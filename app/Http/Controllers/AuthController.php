<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate(['accessToken' => 'required']);

        $providerUser = Socialite::driver('google')->userFromToken($request->accessToken);

        [$username, $domain] = explode('@', $providerUser->email);

        if (strpos($domain, 'student.upnjatim.ac.id') === false)
            return response()->json(['message' => 'Gunakan akun google UPN!'], 401);
        else if (substr($username, 2, 2) !== '08')
            return response()->json(['message' => 'Akun google tersebut tidak terdaftar sebagai mahasiswa Informatika'], 401);

        $user = User::query()->firstOrCreate([
            'provider_id' => $providerUser->getId(),
        ], [
            'name' => $providerUser->name,
            'email' => $providerUser->email,
            'npm' => strtok($providerUser->email, '@'),
            'role' => 2,
            'picture' => $providerUser->avatar
        ]);

        Auth::login($user);

        return $user;
    }

    public function Callback()
    {
        $user = Socialite::driver('google')->user();

        dd($user);
    }
}
