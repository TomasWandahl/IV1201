<?php

namespace App;
use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CompetenceProfile extends Model
{
    // The Method getCompetencies returns a view consisting of all Competence-records in the database
    function getCompetencies() {
        //paginate kommer returnera resultaten 1000 i taget, och skapa nya pages om resultatet överstiger 1000
        $competencies = CompetenceProfile::paginate(2);
        return view('viewComp', ['competencies' => $competencies]);
    }

    function getCompetenceByUserIdResult($userid) {
        $userCompetencies = CompetenceProfile::where('userid', $userid)->get();
        return view('application', ['userCompetencies' => $userCompetencies, 'applicantName' => $userCompetencies->first()->username]);
    }

    // The Method getUsernamesByCompetence($competence) takes in an competence which it uses in order to query
    // the database for records which corresponds with the inputed competence.
    // Returns a list of all records of the correct competence.
    function getUsernamesByCompetence($competence) {
        $userCompetencies = CompetenceProfile::where('competence', $competence)->get();
        return $userCompetencies;
    }
    // The Method getCompetencesListbyUserId($userid) takes in an user-id that it uses in an query to
    // the database in order to retrieve all database records of competencies associated to that userid.
    // Returns a view consisting of the retrieved competencies.
    function getCompetenceByUserId($userid) {
        $userCompetencies = CompetenceProfile::where('userid', $userid)->get();
        return view('home', ['userCompetencies' => $userCompetencies,]);
    }

    // The Method getCompetencesListbyUserId($userid) takes in an user-id that it uses in an query to
    // the database in order to retrieve all database records of competencies associated to that userid.
    // Returns a list of competencies.
    function getCompetenceListByUserId($userid){
        $userCompetencies = CompetenceProfile::where('userid', $userid)->get();
        return $userCompetencies;
    }

    // The Method deleteCompetencies deletes all competencis associated with the currently logged in user.
    // Returns a view with a notification.
    function deleteCompetencies() {
        $office = CompetenceProfile::where('userid', Auth::user()->id);
        $office->delete();
        $userCompetencies = CompetenceProfile::where('userid', Auth::user()->id)->get();
        return view('home', ['userCompetencies' => $userCompetencies, 'result' => "Competencies sucessfully deleted"]);
    }

    // The Method uploadCompetence($erquest) takes in a HTTP-request and extracts data which it attempts to
    // upload to the database. The method returns a view with an appropriate notification-message
    // depending on the result of the database-upload.
    function uploadCompetence(Request $request) {
        $cp = new CompetenceProfile;
        $cp -> username = Auth::user()->name;
        $cp -> userid = Auth::user()->id;
        $cp -> competence = $request->input("comp");
        $cp -> yearsOfExperience = $request->input("yearsOfExp");
        $cp -> competenceDesc = $request->input("compDesc");

        DB::transaction(function() use ($cp){
            try{
                $cp-save();
            } catch(Exception $e){
                return view('home', ['uploadresult' => "Something went wrong while trying to upload your competence."]);
            }
        }, 5);


        $userCompetencies = CompetenceProfile::where('userid', Auth::user()->id)->get();
        return view('home', ['userCompetencies' => $userCompetencies,'result' => "Competencies sucessfully uploaded"]);
    }
    protected $table = 'competenceprofiles';
}