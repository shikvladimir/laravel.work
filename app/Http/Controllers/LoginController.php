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
//        $u_message = $request->input('u_message');
//        $chatUser['u_message'] = $u_message;
//        array_push($chatUser, $u_message);
//        Session::put('chatUser', $chatUser);


        $chatAdmin = Session::get('chatAdmin', []);
//        $a_message = $request->input('a_message');
//        $chatAdmin['a_message'] = $a_message;
//        array_push($chatAdmin, $a_message);
//        Session::put('chatAdmin', $chatAdmin);

        session_destroy();
        return view('auth.login',compact('chatUser','chatAdmin'));
    }

    public function checkLogin(Request $request)
    {

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'confirmed' => 1])) {
            return view('home.home');
        } else {
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

}
