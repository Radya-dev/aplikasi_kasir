<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
     public function ShowLogin()
     {
        if (Auth::check()) {
            return redirect("/");
     } else {
         return view("login");
     }
    }


    public function actionLogin(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password'=> $request->password,
        ];

        if (Auth::attempt($data)) {
            return redirect('/')->with(['success' => 'Login Berhasil']);
        } else {
            return redirect('/login')->with(['error'=> 'Email Atau Password Anda Salah']);
        }
    }

    public function actionLogout(){
        Auth::logout();
        return redirect('/login')->with(['success'=> 'Anda Berhasil Logout']);
    }
}
