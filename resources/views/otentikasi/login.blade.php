<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Masuk Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="{{ url('') }}/logo/hss.png" rel="icon">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('') }}/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ url('') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('') }}/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page" style="background: grey">
<div class="login-box">

  <div class="card">
    <div class="card-body login-card-body">
      {{--  <p class="login-box-msg">Sign in to start your session</p>  --}}
      <div class="row">
        <div class="col-12"><label style="text-align: center">Masukan Username dan Password Untuk Masuk ke menu Admin</label>
        </div>

      </div>
      <hr>

      <form method="POST" action="{{ route('masuk') }}" class="needs-validation" novalidate="">
        @csrf
      <div class="form-group">
        <label for="email">Username</label>
        <input id="name" type="text" class="form-control" name="name" tabindex="1" required autofocus>
        <div class="invalid-feedback">
          Please fill in your username
        </div>
      </div>

      <div class="form-group">
        <div class="d-block">
            <label for="password" class="control-label">Password</label>
        </div>
        <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
      </div>
      @if (session('message'))
        <div class="alert alert-danger alert-dismissible show fade">
          <div class="alert-body">
           <button class="close" data-dismiss="alert">
             <span>×</span>
           </button>
         {{ session('message') }}
          </div>
         </div>
      @endif
      <div class="form-group">
        <button type="submit" class="btn btn-info btn-lg btn-block" tabindex="4">
          Masuk
        </button>
      </div>
    </form>
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ url('') }}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ url('') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ url('') }}/dist/js/adminlte.min.js"></script>

</body>
</html>
