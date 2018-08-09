<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-Penduduk</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('homepage/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{asset('homepage/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="{{asset('homepage/vendor/simple-line-icons/css/simple-line-icons.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('homepage/css/stylish-portfolio.min.css')}}" rel="stylesheet">
    <link href="{{asset('homepage/css/animate.css')}}" rel="stylesheet">
    <style media="screen" type="text/css" rel="stylesheet">
        /* Style the tab */
    .tab {
        overflow: hidden;
        border: 1px solid #ccc;
        background-color: #a2ca1a;
        border-radius: 5px;
    }

    /* Style the buttons inside the tab */
    .tab button {
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
        font-size: 17px;
        color: #fff;
    }

    /* Change background color of buttons on hover */
    .tab button:hover {
        background-color: #648000;
    }

    /* Create an active/current tablink class */
    .tab button.active {
        background-color: #648000;
    }

    /* Style the tab content */
    .tabcontent {
        display: none;
        padding: 6px 12px;
        border: 1px solid #ccc;
        border-top: none;
    }
    /* Fade in tabs */
    @-webkit-keyframes fadeEffect {
        from {opacity: 0;}
        to {opacity: 1;}
    }

    @keyframes fadeEffect {
        from {opacity: 0;}
        to {opacity: 1;}
    }
    </style>

  </head>

  <body id="page-top" class="animated fadeIn">
    <!-- Navigation -->
    <a class="menu-toggle rounded" href="#">
      <i class="fa fa-bars"></i>
    </a>
    <nav id="sidebar-wrapper">
      <ul class="sidebar-nav">
        <li class="sidebar-brand">
          <a class="js-scroll-trigger" href="#page-top">Menu</a>
        </li>
        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="#page-top">Home</a>
        </li>
        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="#about">About</a>
        </li>
        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="#services">Services</a>
        </li>
        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="#portfolio">Portfolio</a>
        </li>
        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="#contact">Contact</a>
        </li>
      </ul>
    </nav>

    <!-- Header -->
    <header class="masthead d-flex">
      <div class="container my-auto">
        <div class="animated fadeInLeft" style="background:#fff; max-width:550px;width:100%;padding:30px;border-radius:10px;opacity:0.9;margin-top: -100px;padding-top: 0;">
        <h1 class="animated fadeIn delay-1s mb-1 text-center">
          <!-- <img src="img/icon.png" alt="" style="float:left;width:60px;"> -->
          <font color="#8fad1b" style="font-size:40px">PPDM</font></h1>
        <h3 class="mb-2" style="text-shadow: 0 0 20px #fff;">
          <p class="  animated fadeIn delay-2s" style="color:#4b4747;text-align:center;font-size:20px;">Aplikasi Kependudukan Untuk Permohonan Surat </p>
        </h3>
        <div class=" animated fadeIn delay-3s">

        <div class="tab">
          <button class="tablinks active" onclick="openCity(event, 'London')">Cek Surat</button>
          <button class="tablinks" onclick="openCity(event, 'Paris')">Login</button>
          <button class="tablinks" onclick="openCity(event, 'Tes')">Register</button>
        </div>
        <div id="London" class="tabcontent" style="display:block">
          <center> <h4 style=" padding:10px;">Cek Permohonan Surat</h4></center>
          <div class="row animated flipInX" style="width:100%; margin-bottom:20px;text-align:center;">
            <form class="" action="#" method="post" style="width:100%">
              <div class="col-md-12" style="width:100%;padding-right: 0px;">
                <input type="text" name="username" id="username" value="" placeholder="Kode Permohonan" style="text-align:center;border-radius:5px;width:100%;padding:15px;border:solid thin #ddd;background:#fff;margin-bottom:10px;">
                <p style="color:#4b4747">Masukkan kode permohonan surat pada kolom diatas untuk melakukan pengecekan status surat.</p>
            </div>
            </form>
          </div>
          <a class="animated fadeIn btn btn-primary js-scroll-trigger" href="#about" style="height:40px;width:100%;max-width:550px;">Cek</a>
        </div>
      </div>

        <div id="Paris" class="tabcontent">
            <center> <h4 style=" padding:10px;color:#4b4747">Login Akun</h4></center>
          <div class="row animated flipInX" style="width:100%; margin-bottom:20px;">
            <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}" style="width:100%">
              @csrf
              <div class="col-md-12" style="width:100%;padding-right: 0px;text-align:center;">
                <input id="email" type="email" placeholder="{{ __('E-Mail Address') }}" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus style="text-align:center;border-radius:5px;width:100%;padding:15px;border:solid thin #ddd;background:#fff;margin-bottom:10px;">
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-md-12" style="width:100%;padding-right: 0px;text-align:center;">
                <input style="text-align:center;border-radius:5px;width:100%;padding:15px;border:solid thin #ddd;background:#fff;"  id="password" type="password" placeholder="{{ __('Password') }}" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
          </div>
          <input type="submit" class="animated fadeIn btn btn-primary js-scroll-trigger" value="Login" style="height:40px;width:100%;max-width:550px;">
        </form>
        </div>

        <div id="Tes" class="tabcontent">
            <center> <h4 style=" padding:10px;color:#4b4747">Daftar Akun Baru</h4></center>
          <div class="row animated flipInX" style="width:100%; margin-bottom:20px;">
              <form method="POST" action="{{route('register') }}" aria-label="{{ __('Register') }}" style="width:100%">
              <div class="col-md-12" style="width:100%;padding-right: 0px;">
                <input id="name" placeholder="Nama Lengkap" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus style="text-align:center;border-radius:5px;width:100%;padding:15px;border:solid thin #ddd;background:#fff;margin-bottom:10px;">

                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-md-12" style="width:100%;padding-right: 0px;">
              <input id="email" type="email" placeholder="Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required style="text-align:center;border-radius:5px;width:100%;padding:15px;border:solid thin #ddd;background:#fff;margin-bottom:10px;">
              @if ($errors->has('email'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
              @endif
          </div>
          <div class="col-md-12" style="width:100%;padding-right: 0px;">
            <input id="password" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required style="text-align:center;border-radius:5px;width:100%;padding:15px;border:solid thin #ddd;background:#fff;">
            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
        <div class="col-md-12" style="width:100%;padding-right: 0px;margin-top:10px;">
          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirm Password" style="text-align:center;border-radius:5px;width:100%;padding:15px;border:solid thin #ddd;background:#fff;">
        </div>
          </div>
          <input type="submit" class="animated fadeIn btn btn-primary js-scroll-trigger" style="height:40px;width:100%;max-width:550px;" value="Simpan">
        </form>
        </div>

        </div>
      </div>
    </header>

    <!-- About -->
    <section class="content-section bg-light" id="about">
      <div class="container text-center">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <h2 class="animated zoomInLeft delay-1s">Aplikasi Permohonan Surat</h2>
            <p class="lead mb-5 animated zoomInLeft delay-2s">Kini permohonan surat menjadi lebih mudah dengan aplikasi E-Penduduk. Dengan aplikasi ini, permohonan surat semudah genggaman. Anda cukup siapkan berkas dan upload berkas ke aplikasi. Admin akan memproses permohonana Anda dan Anda dapat mengecek status permohonan langsung lewat aplikasi</p>
            <a class="btn btn-dark btn-xl js-scroll-trigger animated zoomInLeft delay-3s" href="#services">Apa Yang Kami Tawarkan</a>
          </div>
        </div>
      </div>
    </section>

    <!-- Services -->
    <section class="content-section bg-primary text-white text-center" id="services">
      <div class="container">
        <div class="content-section-heading">
          <h3 class="text-secondary mb-0 animated zoomInLeft">Fasilitas dan layanan</h3>
          <h2 class="mb-5">Layanan Kami</h2>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
            <span class="service-icon rounded-circle mx-auto mb-3">
              <i class="icon-screen-smartphone"></i>
            </span>
            <h4>
              <strong>Responsive</strong>
            </h4>
            <p class="text-faded mb-0">Aplikasi E-Penduduk Responsive, dapat dengan mudah diakses pada seluruh device baik android, iOS, maupun perangkat laptop</p>
          </div>
          <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
            <span class="service-icon rounded-circle mx-auto mb-3">
              <i class="icon-notebook"></i>
            </span>
            <h4>
              <strong>Sistem Terintegrasi</strong>
            </h4>
            <p class="text-faded mb-0">Aplikasi E-Penduduk didukung dengan sistem terintegrasi yang memudahkan proses permohonan surat secara online</p>
          </div>
          <div class="col-lg-3 col-md-6 mb-5 mb-md-0">
            <span class="service-icon rounded-circle mx-auto mb-3">
                <i class="icon-support"></i>
            </span>
            <h4>
              <strong>Mudah</strong>
            </h4>
            <p class="text-faded mb-0">Dengan riset dan hasil uji coba, Aplikasi E-Penduduk dibuat sangat <i> User Friendly</i>, Artinya aplikasi E-Penduduk sangat mudah diaplikasikan
          </div>
          <div class="col-lg-3 col-md-6">
            <span class="service-icon rounded-circle mx-auto mb-3">
              <i class="icon-like"></i>
            </span>
            <h4>
              <strong>Terpercaya</strong>
            </h4>
            <p class="text-faded mb-0">Aplikasi E-Penduduk sudah diaplikasikan di desain dengan tenaga ahli yang selalu memaintenance program untuk menjaga agar program tetap berjalan sempurna</p>
          </div>
          <div class="col-md-12" style="margin-top:50px;">
            <a href="#portfolio" class="js-scroll-trigger">  <img class="img-fluid" src="img/arrow.gif" alt="" style="width:40px;"></a>
          </div>
        </div>
      </div>
    </section>

    <!-- Callout -->
    <section class="callout" id="portfolio">
      <div class="container text-center">
        <h2 class="mx-auto mb-1" style="color:#fff; text-shadow: 0px 0px 2px #000;">
          <em>E - Penduduk</em></h2>
          <h3 style="color:#fff; text-shadow: 0px 0px 2px #000;">Aplikasi Kependudukan Untuk Permohonan Surat</h3><br>
        <a href="https://play.google.com/store/apps/details?id=com.E-Penduduk"> <img src="img/google.png" alt="" style="width:100%;max-width:180px"> </a>
        <a href="#"> <img src="img/apple.png" alt="" style="width:100%;max-width:180px;margin-top:-11px;"> </a>
      </div>
    </section>



    <!-- Call to Action -->
    <section class="content-section bg-primary text-white" id="testimonial">
      <div class="container text-center">
        <h2 class="mb-4">Hubungi Kami</h2>
        <p>Jika ada pertanyaan seputar E-Penduduk, Anda dapat mengisi form berikut</p>
        <input type="email" name="email" value="" placeholder="Email ..." style="width:60%; padding:10px; border:none;margin-bottom:;border-radius:10px 10px 0px 0px;">
        <textarea name="desc" rows="5" cols="80" style="width:60%; padding:10px;border:none;">Your Message ...</textarea>
        <a href="#" class="btn btn-xl btn-dark" style="width:60%; padding:10px">Send</a>
      </div>
    </section>

    <!-- Footer -->
    <footer class="footer text-center">
      <div class="container">
        <ul class="list-inline mb-5">
          <li class="list-inline-item">
            <a class="social-link rounded-circle text-white mr-3" href="#">
              <i class="icon-social-facebook"></i>
            </a>
          </li>
          <li class="list-inline-item">
            <a class="social-link rounded-circle text-white mr-3" href="#">
              <i class="icon-social-twitter"></i>
            </a>
          </li>
          <li class="list-inline-item">
            <a class="social-link rounded-circle text-white" href="#">
              <i class="icon-social-github"></i>
            </a>
          </li>
        </ul>
        <p class="text-muted small mb-0">Copyright &copy; E-Penduduk 2018</p>
      </div>
    </footer>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded js-scroll-trigger" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('homepage/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('homepage/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Plugin JavaScript -->
    <script src="{{asset('homepage/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for this template -->
    <script src="{{asset('homepage/js/stylish-portfolio.min.js')}}"></script>
    <script>
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }
    </script>

  </body>

</html>
