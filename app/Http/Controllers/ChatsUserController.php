<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ChatsUserController extends Controller
{
    public function chatsUser(Request $request)
    {
        session_start();

        $chat = Session::get('chat',[]);
        $chatUser = Session::get('chatUser', []);
        $u_message = $request->input('u_message');
        array_push($chatUser, $u_message);
        Session::put('chatUser', $chatUser);

        $chatAdmin = Session::get('chatAdmin', []);



//        dump($chatAdmin);
//        dd($chatUser);


        return back()->with('auth.login', compact('chatUser', 'chatAdmin'));
    }
}
