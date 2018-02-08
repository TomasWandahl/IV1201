<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompetenceProfile;
use Auth;


class CompetenceController extends Controller
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

    function uploadCompetence(Request $request) {
        $cp = new CompetenceProfile();
        return ($cp->uploadCompetence($request));

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
