<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>PARAMATA</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <?php echo $this->session->flashdata("k") ?>
    <p class="login-box-msg">Form Login</p>

    <form action="<?php echo base_url().'admin/login' ?>" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Username" name="email" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>

<script type="text/javascript">
  function forgotPass() {
    // var type = $('#type').is(":checked");
    var base_url = "<?=base_url() ?>";
    // if(type==true){
    //   var paramForgot = 1;
    // }else{
    //   var paramForgot = 2;
    // }
    // window.location.href = base_url + 'setup/forgot' ;
    // window.location.href = base_url + 'setup/forgot?forgot_password=' + paramForgot;
  }
</script>

