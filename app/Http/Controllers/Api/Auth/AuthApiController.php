<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AuthRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthApiController extends Controller
{
    /**
     * @param $user
     * @return void
     */
    public function clearTokens($user) {
        $user->tokens()->delete();
    }

    /**
     * @param AuthRequest $request
     * @param $user
     * @return JsonResponse
     */
    public function setNewToken($user, AuthRequest $request) {
        $this->clearTokens($user);
        $token = $user->createToken($request->device_name)->plainTextToken;
        return response()->json([
            'token' => $token,
            'expiration' => 525600,
        ]);
    }

    /**
     * @param AuthRequest $request
     * @param string|null $pswdHash
     * @return JsonResponse
     * @throws ValidationException
     */
    public function auth(AuthRequest $request) {
        $user = User::where('email', $request->email)->first();
        $device = $request->device_name;
        if($device === 'modal') {
            if(!$user || !hash_equals($request->password, $user->password)) {
                throw ValidationException::withMessages([
                    'error' => ['The provided credentials are incorrect.']
                ]);
            }
            $this->clearTokens($user);
            $token = $user->createToken($device)->plainTextToken;
            return response()->json([
                'token' => $token,
                'expiration' => 525600,
            ]);
        }else {
            $raw = $request->password;
            $hash = $user->password;
            if (!$user || !Hash::check($raw, $hash)) {
                throw ValidationException::withMessages([
                    'error' => ['The provided credentials are incorrect.']
                ]);
            }
            /*logout in other devices*/
            $this->clearTokens($user);
            $token = $user->createToken($device)->plainTextToken;
            return response()->json([
                'token' => $token,
                'expiration' => 525600,
            ]);
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function logout(Request $request) {
        /*logout in other devices*/
        $request->user()->tokens()->delete();
        return response()->json([
            'message' => 'you are logged out'
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function loggedUser(Request $request) {
        $user = $request->user();
        return response()->json([
            'User_logged' => $user,
            'Authentication' => Auth::user()->getAuthPassword()
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function me(Request $request) {
        $user = $request->user();
        return response()->json([
            'User_logged' => $user,
            'Authentication' => Auth::user()->getAuthPassword()
        ]);
    }
}
