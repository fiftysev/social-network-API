<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/**
 * @group Authentication
 *
 * API endpoints for app auth.
 */

class AuthController extends Controller
{
    /**
     * Register new user
     *
     * @bodyParam first_name string required
     * @bodyParam last_name string required
     * @bodyParam username string required
     * @bodyParam email string required
     * @bodyParam password string required
     * @bodyParam password_confirmation string required
     *
     * @response 201 scenario=Successfully registered {
     *  "token": $10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC
     * }
     */
    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:64',
            'last_name' => 'required|string|max:64',
            'username' => 'required|string|max:64|unique:users',
            'email' => 'required|string|max:256|email|unique:users',
            'password' => 'required|string|min:8|max:24|confirmed'
        ]);

        $request['password'] = Hash::make($request['password']);
        $user = User::query()->create($request->all());

        $token = $user->createToken('API password grant client')->accessToken;
        $response = ['token' => $token];
        return response($response, 201);
    }

    /**
     * Login user
     *
     * @bodyParam username string required
     * @bodyParam password string required
     *
     * @response 200 scenario=Successfully logged in {
     *  "token": $10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC
     * }
     */
    public function login(Request $request)
    {
        $user = User::where('username', $request['username'])->first();

        if (!$user) {
            $response = "User not found";
            return response($response, 404);
        }

        if (!Hash::check($request->password, $user->password)) {
            $response = "Invalid password";
            return response($response, 400);
        }

        $token = $user->createToken('API password grant client')->accessToken;
        $response = ['token' => $token];
        return response($response);
    }

    public function logout(Request $request)
    {
       $token = $request->user()->token();
       $token->revoke();

       $response = "Logged out";

       return response($response);
    }
}
