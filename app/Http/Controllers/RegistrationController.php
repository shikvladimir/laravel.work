<?php

namespace App\Http\Controllers;

use App\Events\EmailToAdmin;
use App\Events\EmailToUser;
use App\Http\Requests\UserRegistrationRequest;
use App\Mail\SendEmailUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use stdClass;

class RegistrationController extends Controller
{
    public function registration()
    {
        return view('auth.registration');
    }

    public function stepRegistration(Request $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $photo = Storage::disk('public')
                ->putFileAs('', $file, $file->getClientOriginalName());
            $data['photo'] = $photo;
        }

        User::create($data);

        $data = new stdClass();
        $data->name = $request->name;
        $data->email = $request->email;

        event(new EmailToAdmin($data));
        event(new EmailToUser($data));

        return redirect()->route('login')
            ->with('success', 'Ваше сообщение успешно отправлено!');
//        return view('auth.login');
    }

}
