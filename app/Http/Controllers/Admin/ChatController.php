<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Any_users;
use App\Models\Chats;
use App\Models\Messages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id = '')
    {

        $any_user_name = 'Admin';
        $chat_id = request('chat_id');
        $chat = Chats::query()
            ->select('chat_name',)
            ->where('id','=',$chat_id)
            ->get();
        $chat_name = null;
        foreach ($chat as $item){
            $chat_name = $item->chat_name;
        }
        $content = $request->input('content');



        Any_users::query()->updateOrInsert([
            'any_user_name' => $any_user_name,
        ]);

        $any_user = Any_users::query()->firstOrCreate([
            'any_user_name' => $any_user_name,
        ]);
        $any_user_id = $any_user->id;


        Chats::query()->updateOrInsert([
            'chat_name' => $chat_name,
            'any_user_id'=>$any_user_id
        ]);

        $chat = Chats::query()->firstOrCreate([
            'chat_name' => $chat_name,
            'any_user_id'=>$any_user_id
        ]);
        $chat_id = $chat->id;


        Messages::query()->insert([
            'content' => $content,
            'chat_id' => $chat_id
        ]);

        Messages::query()
            ->select('content')
            ->get();

        return Redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {

        $chat = Chats::query()
            ->select('chat_name')
            ->where('id','=',$id)
            ->get();
        $chat_name = null;
        foreach ($chat as $item){
            $chat_name = $item->chat_name;
        }

        $contentAll = Messages::query()
            ->select('messages.content')
            ->join('chats','messages.chat_id','=','chats.id')
            ->join('any_users','chats.any_user_id','=','any_users.id')
            ->where('chats.chat_name','=',$chat_name)
            ->orderBy('messages.id')
            ->get();


        return view('admin.chats.chat',compact('contentAll','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $chat = Chats::query()
            ->select('chat_name')
            ->where('id','=',$id)
            ->get();
        $chat_name = null;
        foreach ($chat as $item){
            $chat_name = $item->chat_name;
        }
        Chats::query()->where('chat_name','=',$chat_name)->delete();


        return Redirect::back();
    }
}
