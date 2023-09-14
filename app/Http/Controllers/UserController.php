<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function registerPage()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $validator = validator($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required | min:6',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = password_hash($request->password, PASSWORD_BCRYPT);
        $user->save();

        return redirect('/')->with('info', 'Your account is registered successfully');
    }

    public function loginPage()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/employees');
        } else {
            return back()->with('auth-fail', 'Email and password do not match.');
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
