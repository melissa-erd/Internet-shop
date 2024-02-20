<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
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
            'password_repeat' => 'required',
            'rules' => 'accepted'
        ]);
        User::query()->create([
            'name'=>$request->name,
            'surname'=>$request->surname,
            'patronymic'=>$request->patronymic,
            'login'=>$request->login,
            'email'=>$request->email,
            'password'=>$request->password,
            'password_repeat'=>$request->password_repeat,
            'rules'=>$request->rules,
        ]);
        return redirect()->route('auth.login');
    }
}
