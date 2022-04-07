<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use function PHPUnit\Framework\once;

/**
 * @group Authentication
 *
 * API endpoints for app auth.
 */

// TODO: Вынести логику из контроллера в сервисы
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
     * @bodyParam profile_background file
     * @bodyParam avatar file
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
            'password' => 'required|string|min:8|max:24|confirmed',
            'profile_background' => 'image|mimes:jpg,png|max:2048',
            'avatar' => 'image|mimes:jpg,png|max:2048'
        ]);



        $request['password'] = Hash::make($request['password']);
        $user = User::query()->create($request->all());

        if ($file = $request->file('avatar')) {
            $filename = $user->id.$file->getClientOriginalName();
            $file->storePubliclyAs('avatars/'.$user->id, $filename, 's3');
            $user->update([
                'avatar' => $filename
            ]);
        }

        if ($file = $request->file('profile_background')) {
            $filename = $user->id.$file->getClientOriginalName();
            $file->storePubliclyAs('profile_backgrounds/'.$user->id, $filename, 's3');
            $user->update([
                'profile_background' => $filename
            ]);
        }

        $token = $user->createToken($request->username)->plainTextToken;
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
            $response = ["message" => "User not found"];
            return response($response, 404);
        }

        if (!Hash::check($request->password, $user->password)) {
            $response = ["message" => "Invalid password"];
            return response($response, 400);
        }

        $token = $user->createToken($request->username)->plainTextToken;
        $response = ['token' => $token];
        return response($response);
    }

    /**
     * Logout current auth user
     * @authenticated
     */
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        $response = ["message" => "Logged out"];

        return response($response);
    }


    /**
     * Get info about current auth user.
     * @authenticated
     */
    public function me(Request $request)
    {
        return response($request->user());
    }
}
