<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homePasienController extends Controller
{
    //
	public function index(){
		return view('homePasien');
	}

	public function simpanPasien(Request $request){
		$input = $request->all();

		
			$execute = \App\userModel::execute_pasien($input);

			if($execute){
				echo "Berhasil mengubah user.";
			}else{
				echo "Gagal mengubah user.";
			}
		

	}

}
