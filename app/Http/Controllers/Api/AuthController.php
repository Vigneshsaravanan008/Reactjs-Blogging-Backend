<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required',
                'password' => 'required'
            ]);

            if (User::where('email', $request->email)->exists()) {
                if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
                    $user = User::where('email', $request->email)->first();
                    return response()->json([
                        'status' => 200,
                        'user' => $user,
                        'access_token' => $user->createToken('token')->accessToken,
                    ]);
                } else {
                    return response()->json([
                        'status' => 400,
                        'message' => 'Password is Incorrect',
                    ]);
                }
            } else {
                return response()->json([
                    'status' => 400,
                    'error' => 'Email is Not Registered'
                ]);
            }
        } catch (\Throwable $e) {
            return response()->json([
                'status' => 400,
                'message' => $e->getMessage(),
            ]);
        }
    }
}
