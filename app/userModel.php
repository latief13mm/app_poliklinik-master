<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class userModel extends Model
{

    static function getUserById(){

    	$query = DB::table('login')
    		 ->selectRaw('login.*,pegawai.namaPeg')
    		 ->where('noUser',AUTH::id())
    		 ->join('pegawai','login.NIP','=','pegawai.NIP')
    		 ->limit('1')
    		 ->get();

    		 return $query->toArray();

    }

	static function getPasienById(){

    	$query = DB::table('pasien')
    		 ->selectRaw('pasien.*,pasien.namaPas')
    		 ->where('NoPasien',AUTH::id())
    		 ->get(1);

    		 return $query->toArray();

    }

    static function execute_user($input){
    	try {
    		
    		$query = DB::table('login')
    				 ->where('noUser',$input['noUser'])
    				 ->update([
    				 	'username' => $input['username'],
    				 	'password' => $input['password']
    				 ]);

    		return true;
    	} catch (Exception $e) {
    		return false;
    	}
    }


	static function execute_pasien($input){
    	try {
    		
    		$query = DB::table('pasien')
    				 ->where('NoPasien',$input['NoPasien'])
    				 ->update([
    				 	'username' => $input['username'],
    				 	'password' => $input['password']
    				 ]);

					 dd($query);
    		return true;
    	} catch (Exception $e) {
    		return false;
    	}
    }

}
