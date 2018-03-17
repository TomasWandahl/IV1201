<?php namespace App;
use Auth;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class admin extends Model
{
	
    function uploadUserrole($userid) {
        try{
            $ur = new admin;
            $ur -> user_id = $userid;
            $ur -> user_role = 'user';
            $ur -> save();
         }
         catch(\Exception $e){
            return $e;
         } 


    }
	
    protected $table = 'admins';
}

