<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        return view('login');
    }
    public function index(){
        return view('logout');
    }
    public function loginProses(Request $req){
        if(Auth::attempt(['email' => $req->email, 'password' => $req->pass])){
            if(Auth::user()->role==1){
                return redirect('/');
            }else{
                return redirect('/user');
            }
            
        }
    }
    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
