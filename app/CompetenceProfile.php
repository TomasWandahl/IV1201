<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class CompetenceProfile extends Model
{
    function uploadCompetence(Request $request) {
        try{
            $this -> personId = Auth::user()->id;
            $this -> yearsOfExperience = $request->input("yearsOfExp");
            $this -> competenceDesc = $request->input("compDesc");
            $this -> availability = 0;
            $this -> save();
         }
         catch(\Exception $e){
            return view('result', ['result' => "Something went fishy while trying to upload competence profile"]);
         } 

         return view('result', ['result' => "Competence profile successfully uploaded!"]);

    }
}
