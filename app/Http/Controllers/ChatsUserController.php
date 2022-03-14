<?php

namespace App\Http\Controllers;

use App\Helpers\ChatsUserProcessing\Logic_chatUser;
use Illuminate\Http\Request;

class ChatsUserController extends Controller
{
    public function chatsUser(Request $request, Logic_chatUser $logic_chatUser)
    {
        $logic_chatUser->chatUserProcessing($request);

        return back()->with('auth.login');
    }
}
