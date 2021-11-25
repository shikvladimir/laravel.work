<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        session_start();

        $chatUser = Session::get('chatUser', []);
        $chatAdmin = Session::get('chatAdmin', []);

        return view('auth.login',compact('chatUser','chatAdmin'));
    }

    public function checkLogin(Request $request)
    {



        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'confirmed' => 1])) {
            return view('home.home');
        } else {
            $chatUser = Session::get('chatUser', []);
            $chatAdmin = Session::get('chatAdmin', []);
            return view('auth.login',compact('chatUser','chatAdmin'));
//            return view('auth.login');
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

}
