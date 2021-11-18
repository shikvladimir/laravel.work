<?php

namespace App\Http\Controllers;

use App\Mail\EmailUsers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function store(Request $request){


        $email = $request->get('email');

        $data = ([
            'name' =>   $request->get('name'),
            'email' =>  $request->get('email'),
            'lastName' =>  $request->get('lastName'),
            'number_phone' =>  $request->get('number_phone'),
        ]);

        Mail::to($email)->send(new EmailUsers($data));


        return back();

    }

}
