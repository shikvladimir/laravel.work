<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ChatsUserController extends Controller
{
    public function chatsUser(Request $request)
    {
        session_start();

        $chatUser = Session::get('chatUser', []);
        $u_message = $request->input('u_message');
        $chatUser['u_message'] = $u_message;
        array_push($chatUser, $u_message);
        Session::put('chatUser', $chatUser);


        $chatAdmin = Session::get('chatAdmin', []);
        $a_message = $request->input('a_message');
        $chatAdmin['a_message'] = $a_message;
        array_push($chatAdmin, $a_message);
        Session::put('chatAdmin', $chatAdmin);

        session_destroy();
//        dump($chatAdmin);
//        dd($chatUser);
        return back()->with('auth.login',compact('chatUser','chatAdmin'));
    }
}
