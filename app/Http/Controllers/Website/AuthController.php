<?php

namespace App\Http\Controllers\Website;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('website.login');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $successLogin = auth()->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if (!$successLogin) {
            return back()->with('error', 'Please, enter valid email/password');
        }

        return redirect('/');
    }

    public function register()
    {
        return view('website.register');
    }

    public function postRegister(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'password' => 'required',
            'address' => 'required',
        ]);

        $newUser = new User();
        $newUser->name = $request->name;
        $newUser->email = $request->email;
        $newUser->phone = $request->phone;
        $newUser->password = Hash::make($request->password);
        $newUser->address = $request->address;
        $newUser->save();

        return redirect('/login')->with('success', 'You have been registered successfully!');
    }

    public function logout()
    {
        auth()->logout();

        return redirect('/');
    }
}
