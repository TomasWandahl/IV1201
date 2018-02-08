<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\CompetenceProfile;

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
        $cp->uploadCompetence($request);
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
