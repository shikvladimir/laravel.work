<?php

namespace App\Http\Controllers;


use App\Helpers\Logic_login\Logic_login;
use App\Models\Any_users;
use App\Models\Messages;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{
//    public $content;
//
//    public function __construct(Logic_login $content)
//    {
//        $this->content = $content;
//    }

    public function login(Logic_login $logic_login)
    {
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
        $logic_login->logicLogin();
//        $content = $this->content;


        return view('auth.login', compact('content'));
    }

    public function checkLogin(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'confirmed' => 1])) {
            return redirect('/');
        } else {
            return back()->with('warning', 'Неверный логин или пароль!');
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
