<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:6'],
        ]);
        $user = User::create($data);
        $token = $user->createToken('auth_token')->plainTextToken;

        return [
            'user' => $user,
            'token' => $token,
        ];

    }

    public function login(Request $request)
    {
        // Validate the request data
        $data = $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6',
        ]);

        // Log request data for debugging
        \Log::info('Login request data:', ['email' => $data['email']]);

        // Find the user by email
        $user = User::where('email', $data['email'])->first();

        // Log user existence
        if ($user) {
            \Log::info('User found:', ['user' => $user->id]);
        } else {
            \Log::warning('User not found:', ['email' => $data['email']]);
        }

        // Check if the user exists and the password is correct
        if (! $user || ! Hash::check($data['password'], $user->password)) {
            \Log::error('Invalid credentials', ['email' => $data['email']]);

            return response()->json([
                'message' => 'The provided credentials are incorrect.',
            ], 401);
        }

        // Log token creation
        \Log::info('Creating token for user:', ['user' => $user->id]);

        // Create a new token for the user
        $token = $user->createToken('auth_token')->plainTextToken;

        // Log successful login
        \Log::info('User logged in successfully:', ['user' => $user->id]);

        // Return the user and token
        return response()->json([
            'user' => $user,
            'token' => $token,
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json(['message' => 'Successfully logged out']);
    }

    public function createToken(Request $request)
    {
        $token = $request->user()->createToken($request->token_name);

        return response()->json(['token' => $token->plainTextToken]);
    }
}
