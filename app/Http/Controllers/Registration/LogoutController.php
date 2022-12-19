<?php

namespace App\Http\Controllers\Registration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function index(){
        return view('registration.logout');
    }
    public function store(){
        auth()->logout();
        return redirect()->route('login');
    }
}
