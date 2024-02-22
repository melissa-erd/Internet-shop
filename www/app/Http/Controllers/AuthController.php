<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function registerPage():View
    {
        return view('auth.registration');
    }

    public function loginPage():View
    {
        $login = User::all();
        return view('auth.login', compact('login'));
    }

    public function registration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'login' => 'required',
            'email' => 'required',
            'password' => 'required',
            'password_repeat' => 'required'
        ]);
        User::query()->create([
            'name'=>$request->name,
            'surname'=>$request->surname,
            'patronymic'=>$request->patronymic,
            'login'=>$request->login,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'password_repeat'=>Hash::make($request->password_repeat),
        ]);
        return redirect()->route('auth.login');
    }

    public function login(Request $request)
    {
        if(Auth::attempt([
            'login'=>$request->login,
            'password'=>$request->password
        ])) {
        $request->session()->regenerate();
        $user = Auth::user();
        if($request->user()-> isAdmin == 1){
            return redirect()->route('admin.index');
        }
        return redirect()->route('profile', compact('user'));
    }
        return redirect()->route('auth.registration');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth.login');
    }
}
