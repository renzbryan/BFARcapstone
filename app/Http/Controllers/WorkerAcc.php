<?php

namespace App\Http\Controllers;
use App\Models\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkerAcc extends Controller
{
    public function index(){
        return view('workeracc');
    }
    public function register(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('registerworker');
        }
        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:workers',
                'password' => 'required|string|min:8|confirmed',
            ]);
            $worker = new Worker([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
                'fcm_token'=>null,
            ]);
            $worker->save();
            return redirect('/worker');
        }
    }
    public function logout()
{
    Auth::logout();

    return redirect('/');
}
}
