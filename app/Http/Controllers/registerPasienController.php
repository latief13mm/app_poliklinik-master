<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class registerPasienController extends Controller
{
        public function showRegisterForm(){
            return view('register');
        }

        public function registerPost(Request $request){

            $input = $request->all();
    
            $data =  \App\modelMaster::simpanPasienDaftar($input);

            if($data){
                return redirect('loginCustomer')->with('alert-success','Kamu berhasil Register');
            }else{
                echo 'Gagal Menyimpan Data dan Mendaftarkan Pasien.';
            }
        }
}
