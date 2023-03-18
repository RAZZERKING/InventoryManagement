<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function index()
    {
        return view('partials.login.login', [
            'title' => 'Login dulu!!!',
        ]);
    }

    public function auth(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|min:3',
            'password' => 'required',
        ]);
        if (Auth::attempt($credentials)) {
            $user = User::where('username', $request['username'])->first();
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        //return dd(session('username'));
        return back()->with('loginError', 'Login gagal, silahkan coba lagi!!!');
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }
}
