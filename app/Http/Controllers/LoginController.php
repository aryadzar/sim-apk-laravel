<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request){

         $credientials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);


        if(Auth::attempt($credientials)){
            $role = Auth::user()->role;
            $request->session()->regenerate();
            switch ($role) {
                case 'admin':
                    return redirect()->intended('/admin');
                case 'manager':
                    return redirect()->route('/manager');
                case 'teknisi':
                    return redirect()->route('/teknisi');
                default:
                    return redirect('/'); // Redirect ke halaman lain jika peran tidak dikenal
            }
        }


        return back()->with('loginError', "Username atau Password salah");
    }

    public function logout(){
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/');
    }
}
