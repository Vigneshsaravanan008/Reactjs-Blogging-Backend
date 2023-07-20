<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
                if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
                    $user = User::where('email', $request->email)->first();

                    return response()->json([
                        'status' => 200,
                        'user' => $user,
                        'token' => $user->createToken('Laravel Password Grant Client')->accessToken,
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

    public function register(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'password' => 'required'
            ]);

            User::create([
                'name' => request('name'),
                'email' => request('email'),
                'password' => Hash::make(request('password'))
            ]);

            $user = User::where('email', request('email'))->first();



            return response()->json(['status' => 200, 'user' => $user, 'access_token' => $user->createToken('token')->accessToken]);
        } catch (\Throwable $e) {
            return response()->json([
                'status' => 400,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function profile()
    {
        $user = User::where('id', Auth::user()->id)->first();
        return response()->json(['status' => 200, 'user' => $user]);
    }
}
