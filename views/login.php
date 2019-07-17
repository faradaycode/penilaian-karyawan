<!DOCTYPE html>
<html>

<?php 
session_start();
include "../utilities/global_string.php"; ?>

<!-- header, css, meta -->
<head>
  <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
  <!-- FB meta-->
  <meta content='https://www.facebook.com/rezaferdi.simple' property='article:author' />
  <!-- Generator Meta-->
  <meta name="title" content="penilaian-karyawan">
  <meta name="description" content="web app untuk penilaian karyawan memakai algoritma c45 untuk pengambilan keputusan">
  <meta name="keywords" content="penilaian-karyawan, skripsi, c45, ubhara-jaya">
  <meta name="robots" content="noindex, follow">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="language" content="English">
  <meta name="author" content="verdition96">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="../assets/css/main.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/custom.css">

  <!-- Font-icon css-->
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
  <section class="material-half-bg">
    <div class="cover"></div>
  </section>

  <section class="login-content">
    <div class="logo">
      <h1><?php echo $NAMA_APP; ?></h1>
    </div>
    <div class="login-box">

      <form class="login-form" id="formlogin" action="../controllers/controllers.php">
        <h4 class="login-head font-weight-light font-italic text-muted"></i>Login</h4>
        <div class="form-group">
          <label class="control-label">USERID</label>
          <input name="userid" class="form-control" type="text" placeholder="Userid" autofocus>
        </div>
        <div class="form-group">
          <label class="control-label">PASSWORD</label>
          <input name="password" class="form-control" type="password" placeholder="Password">
        </div>
        <div class="form-group">
          <div class="utility">
            <div class="animated-checkbox">
              <label>
                <input type="checkbox"><span class="label-text">Stay Signed in</span>
              </label>
            </div>
            <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Forgot Password ?</a></p>
          </div>
        </div>
        <div class="form-group btn-container">
          <input type="submit" class="btn btn-primary btn-block" value="Login" />
        </div>
      </form>

      <!-- forget password -->
      <form class="forget-form" action="index.html">
        <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Forgot Password ?</h3>
        <div class="form-group">
          <label class="control-label">EMAIL</label>
          <input class="form-control" type="text" placeholder="Email">
        </div>
        <div class="form-group btn-container">
          <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>RESET</button>
        </div>
        <div class="form-group mt-3">
          <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Back to Login</a></p>
        </div>
      </form>
    </div>
  </section>

  <!-- script/js here -->
  <script src="../assets/js/jquery-3.2.1.min.js"></script>
  <script src="../assets/js/popper.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
  <script src="../assets/js/main.js"></script>
  <script src="../assets/js/func.js" type="text/javascript"></script>

  <!-- The javascript plugin to display page loading on top-->
  <script src="../assets/js/plugins/pace.min.js"></script>
  <script type="text/javascript">
    // Login Page Flipbox control
    $('.login-content [data-toggle="flip"]').click(function() {
      $('.login-box').toggleClass('flipped');
      return false;
    });
  </script>

</body>

</html>