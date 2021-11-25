<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ChatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        session_start();

        $users = User::get();
        $chatUser = Session::get('chatUser',[]);
        $chatAdmin = Session::get('chatAdmin',[]);

        return view('admin.chats.chats', compact('users', 'chatUser', 'chatAdmin'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        session_start();

        $chatAdmin = Session::get('chatAdmin', []);
        $a_message = $request->input('a_message');
        array_push($chatAdmin, $a_message);
        Session::put('chatAdmin', $chatAdmin);

        $chatUser = Session::get('chatUser', []);

        return back()->with('admin.chats.chats', compact('chatUser', 'chatAdmin'));


//        return view('admin.chats.chats', compact('chatUser'));
    }

    /**
     * Display the specified resource.
     *
     * //     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
