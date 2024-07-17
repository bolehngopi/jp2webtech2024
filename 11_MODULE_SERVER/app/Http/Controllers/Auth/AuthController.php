<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * @group Authentication
 *
 * APIs for managing authentication
 */
class AuthController extends Controller
{
    /**
     * Login.
     *
     *
     * @unauthenticated
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request, User $user)
    {
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
            return response()->json([
                'user' => $user,
                'token' => $token
            ]);
        }

        return new JsonResponse([
            'message' => 'Invalid login'
        ], 401);
    }

    /**
     * Registration.
     *
     *
     * @unauthenticated
     * @param Request $request
     * @return JsonResponse
     */
    public function register(Request $request): JsonResponse
    {
        $data = $request->validate([
            'username' => 'string|required',
            'password' => 'string|required'
        ]);

        if (User::query()->where('username', $data['username'])->exists()) {
            return response()->json([
                'message' => 'Username already exists'
            ], 400);
        }

        $user = User::create($data);
        $token = $user->createToken('name')->plainTextToken;

        return response()->json([
            'message' => 'Success',
            'user' => $user,
            'token' => $token
        ], 201);
    }

    /**
     * Logout.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function logout(Request $request): JsonResponse
    {
        $user = $request->user();

        if (!$user) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        $user->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Success'
        ]);
    }
}
