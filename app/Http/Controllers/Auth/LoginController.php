<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index()
    {
        return view('pages.auth.gate');
    }

    public function authenticate(Request $request)
    {

        // dd($request->all());
        if (!session()->has('url.intended')) {
            session(['url.intended' => url()->previous()]);
        }

        $credentials = $request->validate([
            'email' => ['required', 'email:dns'],
            'password' => ['required'],
        ]);
        

        if (Auth::attempt($credentials)) {

            
            $request->session()->regenerate();

            // if (Auth::user()->role == 'partner') {
            //     return redirect()->route('dashboard-partner');
            // }

            if (Auth::user()->role == 'admin') {
                return redirect()->route('dashboard-admin');
            }
            if (Auth::user()->role == 'customer') {
                return redirect(session()->get('url.intended'));
            }
            // return redirect()->intended('/');
        }
        return back()->with('loginError', 'Login gagal');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
