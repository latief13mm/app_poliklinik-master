<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class transactionCustomerController extends Controller
{
    //
    public function noUrut_cetak_customer($id){
    	$data['dataNoUrut'] = \App\modelTransaksi::getAllDataPendaftaranPasienByID($id);
    	return view('mockupCustomer/cetakNoUrut')->with($data);
    }

    
    public function pendaftaran_customer(){
    	$data['getDataPendaftaran'] = \App\modelTransaksi::getAllDataPendaftaranPasien();
    	return view('transaksiCustomer/pendaftaran')->with($data);
    }

    public function pendaftaran_simpan_customer(Request $request){
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

    public function cetakPemeriksaanCustomer($id){
    	$data['KeteranganPemeriksaan'] = \App\modelTransaksi::getPemeriksaanByID($id);
    	return view('mockupCustomer/keterangan_pemeriksaan')->with($data);
    }

    public function cekPendaftarCustomer(){
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

    public function resepCustomer(){
    	$data['listPemeriksaan'] = \App\modelTransaksi::getAllDataPemeriksaanJoin();
    	return view('transaksiCustomer/resep')->with($data);
    }
}
