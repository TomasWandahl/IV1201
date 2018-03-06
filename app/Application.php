<?php

namespace App;
use Auth;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Application extends Model
{
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

    

    

    protected $table = 'applications';
}
