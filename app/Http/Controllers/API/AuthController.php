<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\LoginResource;
use App\Http\Resources\SuccessResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'The provided credentials are incorrect.'], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;
        return new LoginResource(['token' => $token, 'user' => new UserResource($user)]);
    }

    public function logout(Request $request)
    {
        // Get user via token to make sure only the token used to authenticate is revoked
        $request->user()->currentAccessToken()->delete();
        return new SuccessResource([]);
    }
}
