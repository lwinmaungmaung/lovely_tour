<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserAuthenticateRequest;
use Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function postLogin(UserAuthenticateRequest $userAuthenticateRequest)
    {
        if (!($token = Auth::attempt($userAuthenticateRequest->validated()))) {
            return response()->json(['error' => 'Unauthorized'], 401);
        };
        return $this->respondWithToken($token);
    }


    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
