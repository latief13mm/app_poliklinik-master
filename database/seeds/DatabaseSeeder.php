<?php

use App\Pasien;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(User::class);
        // $user = new \App\User;
        // $user->username = '08182';
        // $user->password = bcrypt('2000-05-13');
        // $user->typeUser = 'OPERATOR';
        // $user->NIP = 'K0002';
        // $user->save();

        DB::table('pasien')->insert([
            'NoPasien' => 'P0004',
        	'namaPas' => 'Joni Jono',
        	'almPas' => 'JL Siaga',
        	'telpPas' => '0812880',
        	'tglLahirPas' => '2023-06-27',
            'jenisKelPas' => 'laki-laki',
        	'tglRegistrasi' => '2023-06-27',
        	'username' => 'JoniJono',
            'password' => bcrypt('admin'),
            'remember_token' => Str::random(60), // Menggunakan helper Str::random() untuk menghasilkan token acak
        ]);


        // $this->call(Pasien::class);
        // $user = new \App\Pasien();
        // $user->namaPas = 'Pasien Sakit';
        // $user->almPas = 'JL Siaga';
        // $user->telpPas = '0812880';
        // $user->tglLahirPas = '2023-06-27';
        // $user->jenisKelPas = 'laki-laki';
        // $user->tglRegistrasi = '2023-06-27';
        // $user->username = 'Pasien123';
        // $user->password = bcrypt('admin');
        // $user->NoPasien = 'P0001';
        // $user->save();
    }
}
