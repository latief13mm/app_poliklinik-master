<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class transactionPasienController extends Controller
{
    //
    public function noUrut_cetak_pasien($id){
    	$data['dataNoUrut'] = \App\modelTransaksi::getAllDataPendaftaranPasienByID($id);
    	return view('mockupPasien/cetakNoUrut')->with($data);
    }

    
    public function pendaftaran_pasien(){
    	$data['getDataPendaftaran'] = \App\modelTransaksi::getAllDataPendaftaranPasien();
    	return view('transaksiPasien/pendaftaran')->with($data);
    }

    public function pendaftaran_simpan_pasien(Request $request){
    	$input = $request->all();

    	$data = \App\modelTransaksi::cekJam($input['pilihDokter']);

    	$jamMulai = '';
    	$jamSelesai = '';

    	foreach ($data as $key => $value) {
    		$jamMulai = $value->jamMulai;
    		$jamSelesai = $value->jamSelesai;
    	}

    	date_default_timezone_set('Asia/Jakarta');

    	$jam_sekarang = date('H:m:s');

    	if($jam_sekarang < $jamMulai || $jam_sekarang > $jamSelesai){
    		echo "Jam praktek sudah terlewati atau belum mulai untuk dokter tersebut.";
    	}else{

    		$execute = \App\modelTransaksi::simpanPendaftaran($input);

	    	if($execute){
	    		echo "Berhasil Menyimpan Data Pendaftaran.";
	    	}else{
	    		echo "Gagal Menyimpan Data Pendaftaran.";
	    	}

    	}

    }

    public function cetakPemeriksaanPasien($id){
    	$data['KeteranganPemeriksaan'] = \App\modelTransaksi::getPemeriksaanByID($id);
    	return view('mockupPasien/keterangan_pemeriksaan')->with($data);
    }

    public function cekPendaftarPasien(){
    	date_default_timezone_set('Asia/Jakarta');
    	$hari_ini = date('Y-m-d');
		$listPendaftar = \App\modelTransaksi::getListPendaftarHariIni($hari_ini);


			foreach ($listPendaftar as $key => $value) {
		?>   
				<tr>
					<td><?php echo $value->noUrut ?></td>
					<td><?php echo $value->NoPendaftaran ?></td>
					<td>
					<?php 						
						echo date('d/m/Y',strtotime($value->tglPendaftaran));
					 ?>									
					</td>
					<td><?php echo $value->NoPasien ?></td>
					<td><?php echo $value->namaPas ?></td>
					<td>
						<center>
						<button type="button" class="btn btn-primary btn-xs pilihNoPendaftaranHariIni" data-dismiss="modal"><i class="fa fa-check"> Pilih </i></button>
						</center>
					</td>
				</tr>
			<?php
			                   	
			}
    }

    public function resepPasien(){
    	$data['listPemeriksaan'] = \App\modelTransaksi::getAllDataPemeriksaanJoin();
    	return view('transaksiPasien/resep')->with($data);
    }
}
