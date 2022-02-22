<?php

namespace App\Http\Controllers;

use App\Models\Any_users;
use App\Models\Chats;
use App\Models\Messages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ChatsUserController extends Controller
{
    public function chatsUser(Request $request)
    {
        session_id();
        session_start();

        $any_user_name = $request->input('any_user_name');
        $chat_name = $request->input('chat_name');
        $content = $request->input('content');


        $_SESSION['session_id'] = session_id();
        $_SESSION['any_user_name'] = $any_user_name;
        $_SESSION['chat_name'] = $chat_name;

        $session = Any_users::query()->get('session_id');
        $session_id = null;
        foreach ($session as $value) {
            $session_id = $value->session_id;
        }

        if($any_user_name == null && $_SESSION['session_id'] == $session_id){
            $user_name = Any_users::query()
                ->select('any_user_name')
                ->where('session_id','=',$_SESSION['session_id'])
                ->where('any_user_name','!=','null')
                ->get();
            foreach ($user_name as $item){
                $any_user_name = $item->any_user_name;
            }
        }

        if($chat_name == null && $_SESSION['session_id'] == $session_id){
            $chat = Chats::query()
                ->join('any_users','any_users.id','=','chats.any_user_id')
                ->select('chat_name')
                ->where('session_id','=',$_SESSION['session_id'])
                ->where('chat_name','!=','null')
                ->get();
            foreach ($chat as $item){
                $chat_name = $item->chat_name;
            }
        }


        Any_users::query()->updateOrInsert([
            'any_user_name' => $any_user_name,
            'session_id' => $_SESSION['session_id']
        ]);

        $any_user = Any_users::query()->firstOrCreate([
            'any_user_name' => $any_user_name,
            'session_id' => $_SESSION['session_id']
        ]);
        $any_user_id = $any_user->id;


        Chats::query()->updateOrInsert([
            'chat_name' => $chat_name,
            'any_user_id'=>$any_user_id
        ]);

        $chat = Chats::query()->updateOrCreate([
            'chat_name' => $chat_name,
            'any_user_id'=>$any_user_id
        ]);
        $chat_id = $chat->id;


        Messages::query()->insert([
            'content' => $content,
            'chat_id' => $chat_id
        ]);

        return back()->with('auth.login');
    }
}
