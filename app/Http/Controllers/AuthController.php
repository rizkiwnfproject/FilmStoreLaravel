<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('register');
    }

    public function addRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        User::create($request->all());
        return redirect()->route('login')->with('success', 'User created successfully.');
    }

    public function showLogin()
    {
        return view('login');
    }

    public function getLogin(Request $request)
    {

        
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        $user = User::where('email', $request->email)->first();
        if ($user && $user->password == $request->password) {
            auth()->login($user);  // Login user
            return redirect()->route('dashboard-data')->with('success', 'Login successful.');
        }

        return back()->withErrors(['email' => 'Invalid credentials.'])->withInput();
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login')->with('success', 'You have logged out.');
    }
}
