<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validate the login credentials
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed, redirect to role-based page
            return $this->redirectToRole(Auth::user());
        }

        // Authentication failed, redirect back with email input
        return redirect()->back()->withInput($request->only('email'))->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    protected function redirectToRole($user)
    {
        logger($user->role); // Log the user's role to the Laravel log
        if ($user->role === 'admin') {
            return redirect()->route('admin.index');
        } elseif ($user->role === 'user') {
            return redirect()->route('homepage.index');
        }
    
        // Default redirection if no specific role matched
        return redirect('/');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login');
    }
}
