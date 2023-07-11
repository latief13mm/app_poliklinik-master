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
                <h3>Data <small>CRUD</small></h3>
              </div>

            </div>

            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                
                <div class="showTooltips">
                  
                </div>

                <div class="x_panel">
                  <div class="x_title">
                    <h2>Jadwal Operasional <small>Data</small></h2>
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
                    <hr>
                    <table id="dataJadwal_praktek" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          {{-- <th class="holderToolJadwal_praktek"></th> --}}
                          <th>Hari</th>
                          <th>Jam Mulai</th>
                          <th>Jam Selesai</th>
                          <th>Nama Dokter</th>
                        </tr>
                        
                      </thead>
                
                      <tbody id="showJadwal_praktek">
                         
                         <?php
                            foreach ($dataPraktek as $key => $value) {
                              ?>
                                <tr>
                                  <td>{{ $value->hari }}</td>
                                  <td>{{ $value->jamMulai }}</td>
                                  <td>{{ $value->jamSelesai }}</td>
                                  <td>{{ $value->nmDokter }}</td>
                                </tr>
                              <?php
                            }
                          ?>
                        
                      </tbody>
                      
                    </table>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection


