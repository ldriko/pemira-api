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
        $request->validate([
            'accessToken' => 'required_without:email',
            'email' => 'sometimes|email',
            'password' => 'required_with:email',
        ]);

        if ($request->email) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return Auth::user();
            } else {
                return response()->json(['message' => 'Email atau password tidak sesuai'], 401);
            }
        }

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
            'role' => 0,
            'picture' => $providerUser->avatar
        ]);
        if ($request->token == 1) {
            $login = $user->createToken('login')->plainTextToken;
            return [
                'user' => $providerUser,
                'login_token' => $login,
            ];
        }
        Auth::login($user);

        return $user;
    }

    public function Callback()
    {
        $user = Socialite::driver('google')->user();

        dd($user);
    }
}
