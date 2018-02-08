<?php

namespace App;
use Auth;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class CompetenceProfile extends Model
{
    function uploadCompetence(Request $request) {
        try{
            $cp = new CompetenceProfile;
            $cp -> id = $request->user()->id;
            $cp -> yearsOfExperience = $request->input("yearsOfExp");
            $cp -> competenceDesc = $request->input("compDesc");
            $cp -> availableFrom = date(($request->input("from")));
            $cp -> availableTo = date(($request->input("to")));
            $cp -> save();
         }
         catch(\Exception $e){
             return $e;
            return view('result', ['result' => "Something went wrong while trying to upload your competence profile!"]);
         } 

         return view('result', ['result' => "Competence profile successfully uploaded!"]);

    }

    protected $table = 'competenceprofiles';
}
