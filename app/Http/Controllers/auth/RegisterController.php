<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\PATRON\DAO\User\UserDao;
use App\PATRON\DTO\User\UserDTO;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
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

        if (Auth::check() && Auth::guard('isAdmin')) {
            $estado = true;
            $isAdmin = true;
        }
        else{
            $estado = false;
            $isAdmin = false;
        }

        $userDTO = new UserDTO(
            $id = null,
            $validated['name'],
            $validated['email'],
            $fileName,
            $validated['password'],
            $estado,
            $isAdmin
        );

        $userDAO = new UserDao();
        $user = $userDAO->register($userDTO, $userDTO->getProfileImage(), $userDTO->getEstado(), $userDTO->getIsAdmin());
        
        event(new Registered($user));
        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
