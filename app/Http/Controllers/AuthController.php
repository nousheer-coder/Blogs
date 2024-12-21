<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Blogs;
use Hash;
use Auth;

class AuthController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended('/dashboard'); // Redirect to intended page (or dashboard)
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    // Show the registration form
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Handle registration
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('dashboard');
    }

    public function dashboard(){
        $blogs = Blogs::paginate(10);
        dd( $blogs);

        return view('auth.dashboard',compact('blogs'));
    }

    // Handle logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}

