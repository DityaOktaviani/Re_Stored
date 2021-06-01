<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Re-stored | Login </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url()?>/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url()?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo base_url()?>"><b>RE</b>-stored</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Selamat datang di perpustakaan online</p>

      <form action="#" method="post">
      <small id="error_username" class="text-danger ms-3"></small>
        <div class="input-group mb-3">
          <input type="text" class="form-control username" placeholder="NIM/NIDK/NIDN/NIP">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <small id="error_password" class="text-danger ms-3"></small>
        <div class="input-group mb-3"  id="password" style="display:none;">
          <input type="password" class="form-control password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <small id="error_repassword" class="text-danger ms-3"></small>
        <div class="input-group mb-3" id="repassword" style="display:none;">
          <input type="password" class="form-control repassword" placeholder="retype Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        </form>
        <div class="row">
          <div class="col-7"></div>
          <!-- /.col -->
          <div class="col-5">
            <button class="btn btn-primary btn-block masuk" style="display:none;">
            <i class="fas fa-sign-in-alt"></i> Masuk</button>
            <button class="btn btn-success btn-block aktivasi" style="display:none;">
            <i class="fab fa-creative-commons-by"></i> Aktifasi</button>
            <button class="btn btn-secondary btn-block periksa">
            <i class="fas fa-user-check"></i> Periksa</button>
          </div>
          <!-- /.col -->
        </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo base_url()?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url()?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url()?>/dist/js/adminlte.min.js"></script>

<script>
$(document).ready(function () {

  //mengecek apakah username terdaftar atau tidak
  $(document).on('click','.periksa', function () {
    var username = $('.username').val();

    $.ajax({
        method:"POST",
        url:"/login/check",
        data: {
          'username' : username,
        },
        success:function (response){

          if(response == null){
            $('#error_username').text("NIM/NIDK/NIDN/NIP tidak ditemukan");
            return false;
          }else{
            $('#error_username').text("");
          }

          if(response.status == 1){
            $('#password').show();
            $('#repassword').show();
            $('.periksa').hide();
            $('.aktivasi').show();
          } else {
            $('#password').show();
            $('.masuk').show();
            $('.periksa').hide();
          }
        }
      });
  });

  //aktivasi akun
  $(document).on('click','.aktivasi', function () {
    var username = $('.username').val();
    var password = $('.password').val();
    
    if(validation()){
      $.ajax({
        method:"POST",
        url:"/login/activing",
        data: {
          'username' : username,
          'password' : password,
        },
        success:function (response){
          console.log(response.status);
          if(response.status == 'berhasil'){
            window.location.href = "<?php echo base_url('mhs');?>";
          }else{
            return false;
          }
        }
      });
    }

  });

  $(document).on('click','.masuk', function () {
    var username = $('.username').val();
    var password = $('.password').val();
    
    if(login_validation()){
      $.ajax({
        method:"POST",
        url:"/login/masuk",
        data: {
          'username' : username,
          'password' : password,
        },
        success:function (response){
          console.log(response.status);
          if(response.status == 'berhasil'){
            window.location.href = "<?php echo base_url('mhs');?>";
          }else{
            return false;
          }
        }
      });
    }

  });
});

//mengecek apakah password sudah di isi atau belum
function validation(){
  if($.trim($('.username').val()).length == 0){
    error_username = 'username Kosong';
    $('#error_username').text(error_username);
  }else{
    error_username = '';
    $('#error_username').text(error_username);
  }

  if($.trim($('.password').val()).length == 0){
    error_password = 'password masih Kosong';
    $('#error_password').text(error_password);
  }else if($.trim($('.password').val()).length == 6){
    error_password = 'password minimal terdiri dari 6 karakter';
    $('#error_password').text(error_password);
  }else{
    error_password = '';
    $('#error_password').text(error_password);
  }

  if($.trim($('.repassword').val()).length == 0){
    error_repassword = 'ketik ulang kata sandi';
    $('#error_repassword').text(error_repassword);
  }else if($('.repassword').val() != $('.password').val() ){
    error_repassword = 'kata sandi tidak sesuai';
    $('#error_repassword').text(error_repassword);
  }else{
    error_repassword = '';
    $('#error_repassword').text(error_repassword);
  }

  if(error_repassword != '' || error_password != '' || error_username != ''){
    return false;
  } else {
    return true;
  }
}

function login_validation(){
  if($.trim($('.username').val()).length == 0){
    error_username = 'username Kosong';
    $('#error_username').text(error_username);
  }else{
    error_username = '';
    $('#error_username').text(error_username);
  }

  if($.trim($('.password').val()).length == 0){
    error_password = 'password masih Kosong';
    $('#error_password').text(error_password);
  }else{
    error_password = '';
    $('#error_password').text(error_password);
  }

  if(error_password != '' || error_username != ''){
    return false;
  } else {
    return true;
  }
}
</script>

</body>
</html>
