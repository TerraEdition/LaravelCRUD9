<?php

namespace App\Http\Controllers;

use App\Models\LoginModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Login.Index');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($validate)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        Session::flash('bg', 'alert-danger');
        Session::flash('message', 'Account Not Found');
        return back();
    }

    public function destroy()
    {
        Auth::logout();

        Session::invalidate();

        Session::regenerateToken();

        Session::flash('bg', 'alert-success');
        Session::flash('message', 'Successfull Logout');
        return redirect('/login');
    }
}
