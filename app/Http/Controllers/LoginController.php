<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function checkLogin(Request $request){

        if(Auth::attempt(['email' =>$request->email,'password'=>$request->password,'confirmed' => 1])){
            return view('home.home');
        }else{
            return view('auth.login');
        }

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
            'confirmed' => 'required'
        ]);

        $items = User::create($request->all());

        return back()->with('success', 'Product successfully added.');
    }

    public function chat(Request $request){
//        session_start();
        $_SESSION['message'] = $request->input('message');

        dd($_SESSION);
        return view('auth.login');
    }
}
