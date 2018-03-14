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

    // The method getCompetenciesByUserId reads the session-value id in order to redirect it to the appropriate
    // Model which returns a list of competencies associated with that specific user-id.
    function getCompetenciesByUserId(){
        if(Auth::check()){
            $cp = new CompetenceProfile();
            return $cp->getCompetenceByUserId(Auth::user()->id);
        } else return view('home');
        
    }

    // The Method getApplication($request) takes in a HTTP-request and reads the value to call the appropriate
    // Method in the appropriate Model. Returns a view.
    function getApplication(Request $request){
        $action = $request->input("action");
        $ap = new Application();
        $cp = new CompetenceProfile();

        switch($action) {
            case "name":
                if($request->input('name') !== null){
                    return($ap->getApplicationByName($request->input('name')));
                } else {
                    return view('search', ['notification' => 'You must provide a name!']);
                }
                
            break;
            case "competence":
            if($request->input('competence') !== null) {
                return ($ap->getApplicationByNames($cp -> getUsernamesByCompetence($request->input('competence'))));
            } else {
                return view('search', ['notification' => 'You must provide a competence!']);
            }
                
            break;
            case "date":
                if(($request->input('dateaction') !== null) || ($request->input('date')) !== null){
                    $dateAction = $request->input('dateAction');
                    return($ap->getApplicationByDate($request->input('date'), $dateAction));
                } else {
                    return view('search', ['notification' => 'You must choose to/from and specify a date!']);
                }
                
                
            break;
        }
    }

    // The Method uploadComptence($reqest) takes in a HTTP-request that it reads in order to redirect the request
    // to the appropriate Method in the appropriate Model. The result is that competencies is added or deleted
    // from the database and/or an application is added to the database. The return value is a view.
    function uploadCompetence(Request $request) {
        $cp = new CompetenceProfile();
        $ap = new Application();
        $action = $request->input("action");
        switch($action) {
            case "add":
                if($request->input('comp') === null || $request->input("yearsOfExp") === null || $request->input("compDesc") === null) {
                    return view('home', ['userCompetencies' => ($cp -> getCompetenceListByUserId(Auth::user()->id)),'result' => "Please fill in all fields"]);
                } else {
                    return($cp->uploadCompetence($request));
                }
                
            break;
            case "delete":
                $ap -> deleteApplication();
                return($cp->deleteCompetencies());
            break;
            case "upload":
                if($request->input('to') === null || $request->input('from') === null){
                    return view('home', ['userCompetencies' => ($cp -> getCompetenceListByUserId(Auth::user()->id)),'result' => "Please specify between what dates you are available!"]);
                } else {
                    return($ap->submitApplication($request));
                }
                
            break;
        }


        $cp = new CompetenceProfile();
        return ($cp->uploadCompetence($request));

    }

    // The method GetApplications calls the Application-model and returns a list of all Applications currently
    // in the database.
    function getApplications() {
        $ap = new Application();
        return ($ap->getApplications());
    }

    // the Method getApplicationById($request) takes in a HTTP-request in order to return a specific application
    // that is associated with the input-field 'id' in the request. Returns a view with the result of the search
    // attached to it.
    function getApplicationById(Request $request) {
        $cp = new CompetenceProfile();
        return ($cp->getCompetenceByUserIdResult($request->input('id')));
    }

    // The Method getCompetencies calls the CompetenceProfile-modell in order to retrieve a list of all 
    // Competencies currently in the database.
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
