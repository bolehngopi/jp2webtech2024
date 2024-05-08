<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request, User $user) {
        $credentials = $request->validate([
            'username' => 'string|required',
            'password' => 'string|min:8'
        ]);

        if (
            // User::query()->findOrFail($credentials['username'] ,'username')
            Auth::attempt($credentials)
        ) {
            /**@var \App\Models\User $user */
            $user = Auth::user();
            $token = $user->createToken('name')->plainTextToken;
            return new JsonResponse([
                'user' => $user,
                'token' => $token
            ]);
        }

        return new JsonResponse([
            'message' => 'Invalid login'
        ], 401);
    }

    public function logout(Request $request) {
        if($request->has('token')){
            return new JsonResponse($request);
        }
        return new JsonResponse([
            'message' => 'error'
        ]);
    }
}
