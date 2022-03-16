<?php


namespace App\Helpers\Logic_login;


use App\Models\Any_users;
use App\Models\Messages;

class Logic_login
{


    public function logicLogin(){
//        session_start();
//
//        $any_user_id = Any_users::query()->get();
//
//        $session_id = null;
//        foreach ($any_user_id as $value) {
//            $session_id = $value->session_id;
//        }
//
//
//        if (empty($_SESSION['session_id']) || !isset($_SESSION['session_id'])) {
//            $content = [];
//            return view('auth.login', compact('content', 'any_user_id'));
//        }
//
//        if($session_id != $_SESSION['session_id']){
//            $content = [];
//            return view('auth.login', compact('content','any_user_id'));
//        }
//
//
//        $chat = Any_users::query()
//            ->select('chat_name')
//            ->join('chats','any_users.id','=','chats.any_user_id')
//            ->where('any_users.session_id','=',session_id())
//            ->get();
//        $chat_name = null;
//        foreach ($chat as $item){
//            $chat_name = $item->chat_name;
//        }
//
//        $content = Messages::query()
//            ->select('messages.content','any_user_name')
//            ->join('chats','messages.chat_id','=','chats.id')
//            ->join('any_users','chats.any_user_id','=','any_users.id')
//            ->where('chats.chat_name','=',$chat_name)
//            ->orderBy('messages.id')
//            ->get();
//
//        return view('auth.login', compact('content', 'any_user_id'));

        session_start();

        if (empty($_SESSION['session_id']) || !isset($_SESSION['session_id'])) {
            $content = [];
            return view('auth.login', compact('content'));
        }

        if(session_id() != $_SESSION['session_id']){
            $content = [];
            return view('auth.login', compact('content'));
        }

        $chat = Any_users::query()
            ->select('chat_name')
            ->join('chats','any_users.id','=','chats.any_user_id')
            ->where('any_users.session_id','=',session_id())
            ->get();
        $chat_name = null;
        foreach ($chat as $item){
            $chat_name = $item->chat_name;
        }

        $content = Messages::query()
            ->select('messages.content','any_user_name')
            ->join('chats','messages.chat_id','=','chats.id')
            ->join('any_users','chats.any_user_id','=','any_users.id')
            ->where('chats.chat_name','=',$chat_name)
            ->orderBy('messages.id')
            ->get();

        return view('auth.login', compact('content'));
    }

}
