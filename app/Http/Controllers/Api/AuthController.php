<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = password_hash($request->password, PASSWORD_BCRYPT);
        $user->save();

        $token = $user->createToken('Token');
        if($user) {
            return response()->json([
                'status' => 201,
                'message' => "Successfully created.",
                'token' => $token->accessToken,
            ]);
        }
        else {
            return response()->json([
                'status' => 400,
                'message' => "Please fill the inputs.",
            ]);
        }
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = auth()->user();

            return $user;
        }

        return "Email and password do not match";
    }

    public function showList()
    {
        $users = User::all();
        return response()->json([
            'status' => 200,
            'message' => "Successfully done.",
            'data' => $users
        ]);
    }
}
