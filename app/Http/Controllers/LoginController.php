<?php

namespace App\Http\Controllers;

use App\Models\Any_users;
use App\Models\Chats;
use App\Models\Messages;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {

        session_start();

        $any_user_id = Any_users::query()->get();

        $session = Any_users::query()->get('session_id');
        $session_id = null;
        foreach ($session as $value) {
            $session_id = $value->session_id;
        }


//        echo($session_id);


        if (empty($_SESSION['session_id']) || !isset($_SESSION['session_id'])) {
            $content = [];
            return view('auth.login', compact('content', 'any_user_id'));
        }

        if($session_id != $_SESSION['session_id']){
            $content = [];
            return view('auth.login', compact('content','any_user_id'));
        }


        $chat = Chats::query()->get('id');
        $one_chat = null;
        foreach ($chat as $value) {
            $one_chat = $value->id;
        }
dump($_SESSION) ;


        $content = Messages::query()
            ->join('chats','chats.id','=','messages.chat_id')
            ->join('any_users','any_users.id','=','chats.any_user_id')
            ->select('content', 'chat_id','session_id')
            ->groupBy('content', 'chat_id','session_id')
            ->having('chat_id', '=', $one_chat)
            ->get();



//        foreach ($session as $i) {
//            $us[] = $i->any_user_name;
//        }
//
//        foreach ($us as $v) {
//            if ($_SESSION['any_user_name'] != $v) {
////                Any_users::query()->where('any_user_name', '=', $v)->delete();
//            }

//        }


        return view('auth.login', compact('content', 'any_user_id'));

    }

    public function checkLogin(Request $request)
    {
        $data = [];
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'confirmed' => 1])) {
            return redirect('/');
        } else {
//            $chatUser = Session::get('chatUser', []);
//            $chatAdmin = Session::get('chatAdmin', []);

            return view('auth.login', compact('data'));
        }

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
            'confirmed' => 'required'
        ]);

        User::query()->create($request->all());


        return back()->with('success', 'Product successfully added.');
    }

}
