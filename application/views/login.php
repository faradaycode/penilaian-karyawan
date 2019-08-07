<!DOCTYPE html>
<html>

<!-- load partials head -->
<?php $this->view('partials/head'); ?>

<body>
  <section class="material-half-bg">
    <div class="cover"></div>
  </section>

  <section class="login-content">
    <div class="logo">
      <h1><?php echo APPNAME; ?></h1>
    </div>
    <div class="login-box">
      <form class="login-form" id="formlogin" method="post" action="<?php echo base_url('Login/meLogin'); ?>">
        <h4 class="login-head font-weight-light font-italic text-muted"></i>Login</h4>
        <?php if (isset($error)) {
          echo $error;
        }; ?>
        <div class="form-group">
          <label class="control-label">USERID</label>
          <input name="userid" class="form-control" type="text" placeholder="Userid" autofocus />
          <?php echo form_error('userid'); ?>
        </div>
        <div class="form-group">
          <label class="control-label">PASSWORD</label>
          <input name="password" class="form-control" type="password" placeholder="Password" />
          <?php echo form_error('password'); ?>
        </div>
        <div class="form-group">
          <div class="utility">
            <!-- <div class="animated-checkbox">
              <label>
                <input type="checkbox"><span class="label-text">Stay Signed in</span>
              </label>
            </div> -->
            <!-- <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Forgot Password ?</a></p> -->
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

  <!-- partials scripts -->
  <?php $this->view('partials/scripts'); ?>

  <!-- additional effect, flip -->

  <script type="text/javascript">
    // Login Page Flipbox control
    $('.login-content [data-toggle="flip"]').click(function() {
      $('.login-box').toggleClass('flipped');
      return false;
    });
  </script>

</body>

</html>