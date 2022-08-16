<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }
    public function postRegister(){
        $query = User::insert(['name'       => 'superadmin',
                                'username'  => 'admin',
                                'email'     => 'admin@gmail.com',
                                'password'  => bcrypt('admin'),

        ]);
    }

    public function postLogin(Request $request)
    {
        // dd($request->all());

        $credentials = $request->all();

        if (Auth::attempt($credentials)) {
            return response()->json(['success' => 'suksess']);
        }else
                return response()->json(['errors'=> 'errors']);

    }

    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('admin-login');
    }
}
