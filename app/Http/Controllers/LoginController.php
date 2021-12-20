<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        session_start();

        $chatUser = Session::get('chatUser', []);
        $chatAdmin = Session::get('chatAdmin', []);

        $data[] = [
            'chapter' => 'Данные ожидаются',
            'manufacturer' => 'Данные ожидаются',
            'product' => 'Данные ожидаются',
            'article' => 'Данные ожидаются',
            'number_offers' => 'Данные ожидаются',
            'price' => 'Данные ожидаются',
            'currency' => 'Данные ожидаются',
            'description' => 'Данные ожидаются',
            'maker' => 'Данные ожидаются',
            'importer' => 'Данные ожидаются',
            'service_center' => 'Данные ожидаются',
            'guarantee' => 'Данные ожидаются',
            'delivery_Minsk' => 'Данные ожидаются',
            'delivery_RB' => 'Данные ожидаются',
            'stock_availability' => 'Данные ожидаются'
        ];

        return view('auth.login',compact('chatUser','chatAdmin','data'));
    }

    public function checkLogin(Request $request)
    {
        $data=[];
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'confirmed' => 1])) {
            return redirect('/');
        } else {
            $chatUser = Session::get('chatUser', []);
            $chatAdmin = Session::get('chatAdmin', []);

            return view('auth.login',compact('chatUser','chatAdmin','data'));
        }

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
            'confirmed' => 'required'
        ]);

        $items = User::create($request->all());


        return back()->with('success', 'Product successfully added.');
    }

}
