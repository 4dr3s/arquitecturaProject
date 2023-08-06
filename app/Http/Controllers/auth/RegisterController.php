<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $fileName = time().'.'.$request->profileImage->extension();
        $request->profileImage->storeAs('public/Userimages',$fileName);

        $validated = $request->validated();    
        $validated['password'] = Hash::make($validated['password']);

        $user = User::create($validated);
        $user->profileImage = $fileName;
        $user->save();
        event(new Registered($user));
        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
