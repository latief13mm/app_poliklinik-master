<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Airin Skin Clinik Admin | Login</title>

    <!-- Bootstrap -->
    <link href="{{ asset('Assets') }}/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('Assets') }}/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('Assets') }}/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{ asset('Assets') }}/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('Assets') }}/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            @include('tooltips/tooltips')
            <form action="{{ url('registerPost') }}" method="POST">
              {{ csrf_field() }}
              <h1>Register Customer</h1>
              <div>
                <input type="text" class="form-control" name="nama_pasien" placeholder="Nama Pasien" />
              </div>
              <div>
                <input type="text" class="form-control" name="alamat_pasien" placeholder="Alamat" />
              </div>
              <div>
                <input type="int" class="form-control" name="telp_pasien" placeholder="Nomor Telp" />
              </div>
              <br/>
              <div>
                <input type="date" class="form-control" name="tglLahir_pasien" placeholder="Tanggal Lahir" />
              </div>
              <br/>
              <div>
                <input type="text" class="form-control" name="jenisKel_pasien" placeholder="Jenis Kelamin" />
              </div>
              {{-- <div>
                <input type="date" class="form-control" name="tglRegistrasi" placeholder="Username" />
              </div> --}}
              {{-- <div>
                <input type="password" class="form-control" name="password" placeholder="Password" />
              </div> --}}
              
              <div class="clearfix"></div>

              <div>
                <input type="checkbox" name="remember" /> Remember Me
               <input type="submit" value="Submit" class="btn btn-default submit">
               <input type="submit" value="Cansel" class="btn btn-danger submit">
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-plus-square"></i> Airin Skin Clinik</h1>
                  <p>©2023 All Rights Reserved. Airin Skin Clinik. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>

      </div>
    </div>
  </body>
</html>
