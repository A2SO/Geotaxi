
<body>

  <!-- Page container -->
  <div class="page-container login-container">

    <!-- Page content -->
    <div class="page-content">

      <!-- Main content -->
      <div class="content-wrapper">

        <!-- Advanced login -->
        <?php echo form_open("auth/login");?>
          <div class="panel panel-body login-form">
            <div class="text-center">
              <h1><?php echo lang('login_heading');?></h1>
              <div>   
<img src="<?php echo base_url()?>assets/images/logot.png?>" alt="">

                </div>
<p><?php echo lang('login_subheading');?></p>
            </div>


            <div class="form-group has-feedback has-feedback-left">
    <?php echo form_input($identity,'','class="form-control" placeholder="Usuario"');?>
              <div class="form-control-feedback">
                <i class="icon-user text-muted"></i>
              </div>
            </div>

            <div class="form-group has-feedback has-feedback-left">
    <?php echo form_input($password,'','class="form-control" placeholder="Contraseña"');?>
              <div class="form-control-feedback">
                <i class="icon-lock2 text-muted"></i>
              </div>
            </div>

            <div class="form-group login-options">
              <div class="row">
                <div class="col-sm-6">
                  <label class="checkbox-inline">
    <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
                    Remember
                  </label>
                </div>

                <div class="col-sm-6 text-right">
                  <a href="login_password_recover.html">Forgot password?</a>
                </div>
              </div>
            </div>

            <div class="form-group">
              <?php echo form_submit('submit', 'Iniciar','class="btn bg-blue btn-block"');?>
            </div>

            

            
            <span class="help-block text-center no-margin">By continuing, you're confirming that you've read our <a href="#">Terms &amp; Conditions</a> and <a href="#">Cookie Policy</a></span>
          </div>
       <?php echo form_close();?>
        <!-- /advanced login -->

    <!-- /page content -->


  </div>
  
    </div>

</body>