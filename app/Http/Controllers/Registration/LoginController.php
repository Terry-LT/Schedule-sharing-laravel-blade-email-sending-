<?php

namespace App\Http\Controllers\Registration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('registration.login');
    }
    public function store(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);
        auth()->attempt($request->only('email','password'),$request->rememberMe);
        return redirect()->route('home');
    }
}
