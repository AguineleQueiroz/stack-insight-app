<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AuthRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthApiController extends Controller
{
    public function auth(AuthRequest $request) {
        $user = User::where('email', $request->email)->first();
        if(!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'error' => ['The provided credentials are incorrect.']
            ]);
        }
        /*logout in other devices*/
        $user->tokens()->delete();
        $token = $user->createToken($request->device_name)->plainTextToken;
        return response()->json([
            'token' => $token,
            'expiration' => 525600,
        ]);
    }

    public function logout(Request $request) {
        /*logout in other devices*/
        $request->user()->tokens()->delete();
        return response()->json([
            'message' => 'you are logged out'
        ]);
    }

    public function loggedUser(Request $request) {
        $user = $request->user();
        return response()->json([
            'User_logged' => $user
        ]);
    }

}
