<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\Accounting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        if (Auth::attempt($request->validated(), $remember = true)) {
            return redirect('/');
        }

        return back()->withErrors([
            'login' => 'Credenciales No Encontradas',
        ]);
    }

    public function logOut(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        $accounting = Accounting::updated([
               
        ]);

        return redirect('/');
    }
}
