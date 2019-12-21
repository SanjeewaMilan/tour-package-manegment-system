<?php $this->load->view('auth/head');?>

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b><?php echo lang('forgot_password_heading');?></b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg"><?php echo sprintf(lang('forgot_password_subheading'), $identity_label);?></p>

    <?php echo form_open("auth/forgot_password");?>

    <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="identity">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
   </div>

      <div id="infoMessage"><?php echo $message;?></div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat" name="submit">Submit</button>
        </div>
        <!-- /.col -->
      </div>

    <?php echo form_close();?>

      <a href="login">Login</a><br>
      <a href="create_user" class="text-center">Register a new membership</a>


  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.1.4 -->
<script src="<?php echo base_url();?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url();?>assets/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>