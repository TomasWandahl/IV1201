<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function upload(Request $request) {
        $message = $request->input('message');
        return $message;
    }

    public function add(Request $request) {


        $user = new User();
        $user ->name = "Tompalompa";
        $user ->email = "Email";
        $user ->password = "Lösenord";
        $user -> save();    
        return $user->addition($request->input('x'),$request->input('y'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
}
