@extends('templatesPasien/header')
@section('content')
<div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            
            @include('templatesPasien/navigation')

<?php
    $getPasien = \App\userModel::getPasienById();

    foreach ($getPasien as $key => $value) {
      $id = $value->NoPasien;
      $namaPasien = $value->namaPas;
      $alamatPasien = $value->almPas;
      $telephonePasien = $value->telpPas;
      $tglLahirPasien = $value->tglLahirPas;
      $jenisKelaminPasien = $value->jenisKelPas;
  }
?>


<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Profile Customer</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-6">
                <div class="x_panel">
                  <div class="x_title">
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <!-- start profile -->
                    <div class="card" style="width: 50rem;">
                      <img class="img-circle profile_img" src="{{ asset('Assets') }}/production/images/img.jpg">
                      <div class="card-body" align="center">
                        <h1 class="card-title">{{ $namaPasien }}</h1>
                        <a href="#" class="btn btn-primary">Ubah Foto Profile</a>
                      </div>
                    </div>
                    <!-- end profile list -->
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Biodata</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <center><i>Keterangan Customer</i></center>
                  <table class="table table-stripped">
                    <tr>
                      <td>No Pasien : <b id="noPasienKet">{{ $id }}</b></td>
                    </tr>
                    <tr>
                      <td>Nama Pasien : <b id="naPasKet">{{ $namaPasien }}</b></td>
                    </tr>
                    <tr>
                      <td>Alamat Pasien : <b id="alPasKet">{{ $alamatPasien }}</b></td>
                    </tr>
                    <tr>
                      <td>Telp Pasien : <b id="tePasKet">{{ $telephonePasien }}</b></td>
                    </tr>
                    <tr>
                      <td>Tanggal Lahir Pasien : <b id="tglPasKet">{{ $tglLahirPasien }}</b></td>
                    </tr>
                    <tr>
                      <td>Jenis Kelamin Pasien : <b id="jkPasKet">{{ $jenisKelaminPasien }}</b></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                  </table>
                  <button type="button" class="btn btn-primary" data-nopasien="{{ $id }}" data-namapasien="{{ $namaPasien }}" data-alamatpasien="{{ $alamatPasien }}" data-telephonepasien="{{ $telephonePasien }}" data-tgllahirpasien="{{ $tglLahirPasien }}" data-jeniskelaminpasien="{{ $jenisKelaminPasien }}"  data-toggle="modal" data-target="#editProfile" >Edit Foto Profile</button>
                  {{-- <button class="btn btn-info btn-s editProfile"  id="editProfile" type="submit" data-toggle="modal" data-target=".modal_editProfile">Ubah Data Profile</button>   --}}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        

        <div class="modal fade" id="editProfile" tabindex="-1" role="dialog" aria-labelledby="editProfileLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="editProfileLabel">New message</h4>
              </div>
              <div class="modal-body">
                <form class="form-horizontal form-label-left" id="editProfileForm" action="{{ url('profile/updateProfile') }}" method="POST">
                  {{ csrf_field() }}
                  <span class="section">Personal Info</span>
                  <input type="hidden" name="edit_no_pasien" id="edit_no_pasien">
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="edit_nama_pasien">Nama Pasien <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="edit_nama_pasien"  name="edit_nama_pasien" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  type="text">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="edit_alamat_pasien">Alamat Pasien <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <textarea id="edit_alamat_pasien" name="edit_alamat_pasien" required="required" class="form-control col-md-7 col-xs-12" ></textarea>
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="edit_tel_pasien">Telephone Pasien<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="tel" id="edit_tel_pasien" name="edit_tel_pasien" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="edit_tanggalLahirPasien">Tanggal Lahir Pasien<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="date" id="edit_tanggalLahirPasien" name="edit_tanggalLahirPasien" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="edit_jenisKelPasien">Jenis Kelamin <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <select id="edit_jenisKelPasien" name="edit_jenisKelPasien" required="required" class="form-control col-md-7 col-xs-12">
                        <option value="">-</option>
                        <option value="Laki-Laki" >Laki-Laki</option>
                        <option value="Perempuan" >Perempuan</option>
                      </select>
                    </div>
                  </div>                
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveChangesBtn">save change</button>
              </div>
            </div>
          </div>
        </div>


        {{-- <div class="modal fade modal_editProfile" id="editProfile" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">

              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="editProfile" >Edit Data Profile Pasien</h4>
              </div>
              <div class="modal-body">
                <p>
                  <form class="form-horizontal form-label-left" id="formEditProfile" action="{{ url('profile/editProfile') }}" method="POST" novalidate>
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <span class="section">Personal Info</span>
                    <input type="hidden" name="edit_no_pasien" id="edit_no_pasien" value="{{ $id }}">
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="edit_nama_pasien">Nama Dokter <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="edit_nama_pasien" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="edit_nama_pasien" placeholder="Nama Pasien" required="required" type="text"  value="{{ $namaPasien }}">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="edit_alamat_pasien">Alamat Pasien <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea id="edit_alamat_pasien" required="required" name="edit_alamat_pasien" class="form-control col-md-7 col-xs-12" > {{ $alamatPasien }} </textarea>
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="edit_tel_pasien">Telephone Dokter<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="tel" id="edit_tel_pasien" name="edit_tel_pasien" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12" value="{{ $telephonePasien }}">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="edit_tanggalLahirPasien">Tanggal Lahir Pasien<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="date" id="edit_tanggalLahirPasien" name="edit_tanggalLahirPasien" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12" value="{{ $tglLahirPasien }}">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="edit_jenisKelPasien">Jenis Kelamin <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select id="edit_jenisKelPasien" name="edit_jenisKelPasien" required="required" class="form-control col-md-7 col-xs-12">
                          <option value="">-</option>
                          <option value="Laki-Laki" {{ $jenisKelaminPasien == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                          <option value="Perempuan" {{ $jenisKelaminPasien == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                      </div>
                    </div>                
                  </form>
                </p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="simpanEditanProfile" data-dismiss="modal">Save changes</button>
              </div>
            </div>
          </div>
        </div> --}}
@endsection


