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
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return $this->redirectToRole(Auth::user());
        }

        return redirect()->back()->withInput($request->only('email'));
    }

    protected function redirectToRole($user)
    {
        if ($user->isAdmin()) {
            return redirect()->route('tasks.index');
        } elseif ($user->isUser()) {
            return redirect()->route('homepage.index');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

}
