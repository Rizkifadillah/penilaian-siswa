
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in (v2)</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-danger">
    <div class="card-header text-center">
      <a href="{{ route('dashboard.index')}}" class="h1"><b>SIS</b>pesis</a>
    </div>
    <div class="card-body">
      {{-- <p class="login-box-msg">Sign in to start your session</p> --}}

      <form method="POST" action="{{ route('login') }}">
           @csrf

        <div class="input-group mb-3">
            <div class="col-md-12">

                <label for="email" ><normal>{{ __('E-Mail') }}</normal></label>
    
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
         
        </div>
        <div class="input-group mb-3">
            <div class="col-md-12">
                <label for="password" ><normal>{{ __('Password') }}</normal></label>
    
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row">
          <div class="col-6">
            {{-- <div class="icheck-primary">
             <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
              <p class="mb-1">
                <a href="forgot-password.html">I forgot my password</a>
              </p>
            </div> --}}
            <button type="submit" class="btn btn-danger btn-block btn-sm">Sign In</button>
            
          </div>
          <!-- /.col -->
          <div class="col-6">
            <p class="mb-1 float-center">
                <a href="forgot-password.html" class="btn btn-outline-danger btn-sm col-md-12">Lupa Password</a>
              </p>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mt-2 mb-3">
       
        {{-- <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Register a new membership
        </a> --}}
      </div>
      <!-- /.social-auth-links -->

      {{-- <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p> --}}
      {{-- <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p> --}}
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/dist/js/adminlte.min.js')}}"></script>
</body>
</html>
