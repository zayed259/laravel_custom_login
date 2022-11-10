<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // index
    public function index()
    {
        return view('welcome');
    }
    //register
    public function register()
    {
        return view('auth.register');
    }

    // store
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('dashboard');
    }

    // login
    public function login()
    {
        return view('auth.login');
    }

    // check
    public function check(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        }

        return redirect()->route('login')->with('error', 'Opps! You have entered invalid credentials');
    }

    // dashboard
    public function dashboard()
    {
        return view('auth.dashboard');
    }

    // logout
    public function logout()
    {
        Auth::logout();

        return redirect()->route('index');
    }


    // update password
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
        ]);

        $user = Auth::user();

        if (Hash::check($request->current_password, $user->password)) {
            $user->password = Hash::make($request->password);
            $user->save();

            return redirect()->route('dashboard')->with('success', 'Password changed successfully');
        }

        return redirect()->route('dashboard')->with('error', 'Opps! You have entered invalid current password');
    }

}
