<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function showRegisterForm()
    {
        
        return view('auth.register');
    }
    public function showLoginForm()
    {
        
        
        return ;
        return view('auth.register');
    }

    // Handle registration
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:user,admin', // Accept either 'user' or 'admin'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect('/login')->with('success', 'Registration successful! Please log in.');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required|in:admin,user',
        ]);

        $credentials = $request->only('email', 'password');
        $user = User::where('email', $request->email)->first();

        if ($user && $user->role === $request->role && Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if ($user->role === 'admin') {
                return redirect()->route('dashboard')->with('success', 'Welcome Admin!');
            } else {
                return redirect()->route('home')->with('success', 'Welcome User!');
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records or role.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
