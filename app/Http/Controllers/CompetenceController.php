<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompetenceProfile;
use App\Application;
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

    function getCompetenciesByUserId(){
        if(Auth::check()){
            $cp = new CompetenceProfile();
            return $cp->getCompetenceByUserId(Auth::user()->id);
        } else return view('home');
        
    }

    function getApplication(Request $request){
        $action = $request->input("action");
        $ap = new Application();
        $cp = new CompetenceProfile();
        switch($action) {
            case "name":
                return($ap->getApplicationByName($request->input('name')));
            break;
            case "competence":
                return ($ap->getApplicationByNames($cp -> getUsernamesByCompetence($request->input('competence'))));
                
                return($cp->deleteCompetencies());
            break;
            case "date":
                $dateAction = $request->input('dateAction');
                switch(ucfirst($dateAction)){
                    case "To":
                        return($ap->getApplicationByDate($request->input('date'), $dateAction));
                    break;
                    case "From":
                        return($ap->getApplicationByDate($request->input('date'), $dateAction));
                    break;
                }
                
            break;
        }
    }


    function add_competence(Request $request) {
        return "add";
    }

    function uploadCompetence(Request $request) {
        $cp = new CompetenceProfile();
        $ap = new Application();
        $action = $request->input("action");
        switch($action) {
            case "add":
                return($cp->uploadCompetence($request));
            break;
            case "delete":
                $ap -> deleteApplication();
                return($cp->deleteCompetencies());
            break;
            case "upload":
                return($ap->submitApplication($request));
            break;
        }


        $cp = new CompetenceProfile();
        return ($cp->uploadCompetence($request));

    }

    function getApplications() {
        $ap = new Application();
        return ($ap->getApplications());
    }

    function getApplicationById(Request $request) {
        $cp = new CompetenceProfile();
        return ($cp->getCompetenceByUserIdResult($request->input('id')));
    }

    function getCompetencies(){
        $cp = new CompetenceProfile();
        return($cp->getCompetencies());
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
