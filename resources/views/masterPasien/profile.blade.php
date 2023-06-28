@extends('templates/header')
@section('content')
<div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            
            @include('templatesPasien/navigation')


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
                        <h1 class="card-title">Marisa</h1>
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
                      <td>No Pasien : <b id="noPasienKet"></b></td>
                    </tr>
                    <tr>
                      <td>Nama Pasien : <b id="naPasKet"></b></td>
                    </tr>
                    <tr>
                      <td>Alamat Pasien : <b id="alPasKet"></b></td>
                    </tr>
                    <tr>
                      <td>Telp Pasien : <b id="tePasKet"></b></td>
                    </tr>
                    <tr>
                      <td>Tanggal Lahir Pasien : <b id="tglPasKet"></b></td>
                    </tr>
                    <tr>
                      <td>Jenis Kelamin Pasien : <b id="jkPasKet"></b></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                  </table>
                  <button class="btn btn-primary" type="submit">Ubah Data Profile</button>  
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection


