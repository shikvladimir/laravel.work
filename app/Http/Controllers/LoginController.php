<?php

namespace App\Http\Controllers;

use App\Models\Any_users;
use App\Models\Chats;
use App\Models\Messages;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\isEmpty;

class LoginController extends Controller
{
    public function login(Request $request)
    {

        session_start();

        $session = Any_users::query()->get('session_id');
        $session_id = null;
        foreach ($session as $value) {
            $session_id = $value->session_id;
        }

//        dd($_SESSION);
        if(!isset($_SESSION['session_id'])){
            $content = [];
            return view('auth.login', compact('content'));
        }

        if($session_id != $_SESSION['session_id']){
            $content = [];
            return view('auth.login', compact('content'));
        }


//        dd($_SESSION);
        $chat = Chats::query()->get('id');
        $one_chat = null;
        foreach ($chat as $value) {
            $one_chat = $value->id;
        }
//        dd($one_chat);

        $content = Messages::query()
            ->select('content', 'chat_id')
            ->groupBy('content', 'chat_id')
            ->having('chat_id', '=', $one_chat)
            ->get();


        return view('auth.login', compact('content'));

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
