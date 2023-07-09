<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class controllerMasterPasien extends Controller
{
    //
    public function pasien(){
    	$data['Listpasien'] = \App\modelMaster::getDataPasienById();
    	return view('masterPasien/pasien')->with($data);
    }

    public function pasienSimpanDaftar(Request $request){
    	$input = $request->all();
    	
    	$execute = \App\modelMaster::simpanPasienDaftar($input);

    	if($execute){
    		echo 'Berhasil Menyimpan Data dan Mendaftarkan Pasien.';
    	}else{
    		echo 'Gagal Menyimpan Data dan Mendaftarkan Pasien.';
    	}

    }

    public function cekPasienDaftar($id){
    	$execute = \App\modelMaster::getPasienPendaftaranStatusByID($id);

    	if($execute == 0){
    		echo "Pasien ini belum mendaftar hari ini.";
    	}else{
    		echo "Pasien ini sudah mendaftar sebanyak <b>".$execute." kali</b> untuk hari ini.";
    	}
    }

    public function daftarkanPasienNow($id){
    	$execute = \App\modelMaster::simpanPasienTunggu($id);

    	if($execute != 'zero'){
    		$link = url('pendaftaran/cetaknoUrut').'/'.$execute;
    		echo "Berhasil Mendaftarkan Pasien ke daftar tunggu. Tentukan jadwal dokter nya di form transaksi. <br/><a class='btn btn-info btn-xs' target='_blank' href='".$link."'>Cetak No Urut</a>";
    	}else{
    		echo "Gagal Mendaftarkan Pasien ke daftar tunggu.";
    	}
    }

	public function jenis_biaya(){
    	$data['Listjenisbiaya'] = \App\modelMaster::getListJenisBiaya();
    	return view('masterPasien/jenis_biaya')->with($data);
    }

	public function jadwal_praktek(){
    	$data['Listjadwalpraktek'] = \App\modelMaster::getAllDataJadwal();
    	return view('masterPasien/jadwal_praktek')->with($data);
    }

	public function profilePasien(){
    	return view('masterPasien/profile');
    }


	public function profileEdit(Request $request){
    	$input = $request->all();

    	$execute = \App\modelMaster::editProfile($input);

    	if($execute){
    		echo "Berhasil Mengubah Data Dokter";
    	}else{
    		echo "Gagal Mengubah Data Dokter";
    	}

    }


}
