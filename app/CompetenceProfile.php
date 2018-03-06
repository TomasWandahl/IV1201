<?php
namespace App;
use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
class CompetenceProfile extends Model
{
    function getCompetencies() {
        //paginate kommer returnera resultaten 1000 i taget, och skapa nya pages om resultatet överstiger 1000
        $competencies = CompetenceProfile::paginate(1000);
        return view('viewComp', ['competencies' => $competencies]);
    }
    
    
    function getCompetenceByUserIdResult($userid) {
        $userCompetencies = CompetenceProfile::where('userid', $userid)->get();
        return view('application', ['userCompetencies' => $userCompetencies, 'applicantName' => $userCompetencies->first()->username]);
    }
    function getUsernamesByCompetence($competence) {
        $userCompetencies = CompetenceProfile::where('competence', $competence)->get();
        return $userCompetencies;
    }
    function getCompetenceByUserId($userid) {
        $userCompetencies = CompetenceProfile::where('userid', $userid)->get();
        return view('home', ['userCompetencies' => $userCompetencies,]);
    }
    function updateCompetence(Request $request){
    }
    function deleteCompetencies() {
        $office = CompetenceProfile::where('userid', Auth::user()->id);
        $office->delete();
        $userCompetencies = CompetenceProfile::where('userid', Auth::user()->id)->get();
        return view('home', ['userCompetencies' => $userCompetencies, 'result' => "Competencies sucessfully deleted"]);
    }
    function uploadCompetence(Request $request) {
        try{
            // Lägger upp data på databasen
            $cp = new CompetenceProfile;
            $cp -> username = Auth::user()->name;
            $cp -> userid = Auth::user()->id;
            $cp -> competence = $request->input("comp");
            $cp -> yearsOfExperience = $request->input("yearsOfExp");
            $cp -> competenceDesc = $request->input("compDesc");
            $cp -> save();
         }
         catch(\Exception $e){
             return $e;
            return view('result', ['result' => "Something went wrong while trying to upload your competence profile!"]);
         } 
         $userCompetencies = CompetenceProfile::where('userid', Auth::user()->id)->get();
        return view('home', ['userCompetencies' => $userCompetencies,'result' => "Competencies sucessfully uploaded"]);
    }
    protected $table = 'competenceprofiles';
}