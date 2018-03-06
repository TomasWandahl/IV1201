<?php

namespace App;
use Auth;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Application extends Model
{

    function getApplicationByDate($todate, $direction) {
        $rawQuery = "DATE(available".ucfirst($direction).") = '" . $todate . "'";
        $res = Application::whereRaw($rawQuery)->get();
        return view('viewComp', ['applications' => $res]);
    }

    function getApplicationByNames($names) {
        $json_array  = json_decode($names, true);
        $elementCount  = count($json_array);
        if($elementCount == 0) {
            return view('notification', ["notification" => "No records found"]);
        } else {
            $data =array(); 

        $queri = null;
        $firstname = null;
        foreach($names as $name){
            $firstname = $name->userid;
            $queri = $queri . "`userid` = "  . $name->userid .  ' or ';
        } 
        $queri = $queri . "`userid` = " . $firstname;
        

        $applications = Application::whereRaw($queri)->get();
        return view('viewComp', ['applications' => $applications]);

        }
    }

    function deleteApplication() {
        Application::where('userid', Auth::user()->id)->delete();
    }
    function submitApplication(Request $request) {
        $app = new Application;
        $app -> username = Auth::user()->name;
        $app -> availableFrom = $request->input('from');
        $app -> availableTo = $request->input('to');
        $app -> userid = Auth::user()->id;
        $app -> save();
        return view('home', ['uploadresult' => "Competencies sucessfully deleted"]);
    }

    function getApplications() {
        $applications = Application::paginate(1000);
        return view('viewComp', ['applications' => $applications]);
    }

    function getApplicationByName($name) {
        $blabb =  DB::table('users')->whereRaw('`name` = "' . $name . '"')->get();
        $rawQuery = "`username` = " . '"' . $name . '"';
        $application = Application::whereRaw($rawQuery)->get();
        return view('result', ['application' => $application]);
    }

    

    

    

    

    protected $table = 'applications';
}
