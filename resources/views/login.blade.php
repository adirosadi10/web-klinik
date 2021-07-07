<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Klinik Sehat | Log in</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  @include('layouts/user/css')
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo"><b>Klinik</b> Sehat</a>
    </div>
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Silahkan Log In</p>
        <form action="{{ route('prosesLogin') }}" method="post">
          @csrf
          <div class="input-group mb-3">
            <input type="email" class="form-control" name="email" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  @include('layouts/user/script')
</body>

</html>