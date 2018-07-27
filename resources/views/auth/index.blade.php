<!DOCTYPE html>
<html>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.7.1/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 04 Oct 2017 15:36:08 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Aplikasi Kependudukan</title>

    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

            <h1> <img src="{{asset('assets/img/pas-logo.png')}}" width="40%"> </h1>

            </div>
            <h3>SELAMAT DATANG</h3>
	          <h4>SISTEM APLIKASI KEPENDUDUKAN</h4>
            <p>
            </p>
            <p>Masukkan username dan password</p>

            <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
              @csrf
                <div class="form-group">
                  <input id="email" type="email" placeholder="{{ __('E-Mail Address') }}" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                  @if ($errors->has('email'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
                </div>
                <div class="form-group">
                    <input id="password" type="password" placeholder="{{ __('Password') }}" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
              </form>
            <p class="m-t"> <small>Aplikasi Kependudukan  &copy; 2018</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.7.1/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 04 Oct 2017 15:36:08 GMT -->
</html>
