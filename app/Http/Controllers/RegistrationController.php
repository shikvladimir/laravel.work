<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegistrationRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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
        return redirect()->route('login');
        return view('auth.login');
    }

}
