<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function login(Request $request): JsonResponse
    {
        $this->_validateLogin($request);
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return response()->json([
                'token' => $request->user()->createToken($request->name)->plainTextToken,
                'message' => 'success'
            ]);
        } else {
            return response()->json([
                'message' => 'Unauthorized',
                'code' => '198765'
            ], 401);
        }
    }

    /**
     * @param Request $request
     *
     * @return void
     */
    private function _validateLogin(Request $request): void
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'name' => 'required' // determina desde que dispositivo conecta
        ]);
    }
}
