<?php $this->load->view('header'); ?>
<?php $this->load->view('sidebar'); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashbord
        <small>Optional description</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

      <!-- Main content -->
      <section class="content">
            <div class="row">
                  <div class="col-xs-12">
                        <div class="box">
                              <div class="box-header">
                                    <h1><?php echo lang('change_password_heading');?></h1>
                                    <div id="infoMessage"><?php echo $message;?></div>
                              </div>
                              <!-- / .box header-->
                              <div class="box-body">
                                    <div class="row">
                                          <div class="col-xs-12 col-md-6 col-lg-4">
                                                <?php echo form_open("auth/change_password");?>
                                                <p>
                                                      <?php echo lang('change_password_old_password_label', 'old_password');?> <br />
                                                      <input type="password" class="form-control" placeholder="Old Password" name="old_password" autocomplete="off">
                                                </p>

                                                <p>
                                                      <label for="new_password"><?php echo sprintf(lang('change_password_new_password_label'), $min_password_length);?></label> <br />
                                                      <input type="password" class="form-control" placeholder="New Password" name="new_password" autocomplete="off">
                                                </p>

                                                <p>
                                                      <?php echo lang('change_password_new_password_confirm_label', 'new_password_confirm');?> <br />
                                                      <input type="password" class="form-control" placeholder="Confirm New Password" name="new_password_confirm" autocomplete="off">
                                                </p>

                                                <?php echo form_input($user_id);?>
                                                <button type="submit" class="btn btn-primary btn-block btn-flat" name="submit"><?php echo lang('change_password_submit_btn');?></button>
                                                <?php echo form_close();?>
                                          </div>      
                                    </div>            
                              </div>
                              <!-- / .box body-->
                        </div>
                        <!-- / .Box-->
                  </div>
            </div>
            <!-- /.row-->
      </section>
    </div>  

<?php $this->load->view('footer'); ?>

      <!-- Main content -->
      <section class="content">
            <div class="row">
                  <div class="col-xs-12">
                        <div class="box">
                              <div class="row">
                                    <div class="col-xs-12 col-md-6 col-lg-4">
                                          <div class="box-header"></div><!-- / .Box header-->
                                          <div class="box-body"></div><!-- / .Box body-->
                                          <div class="box-footer"></div><!-- / .Box footer-->
                                    </div>
                              </div>            
                        </div>
                        <!-- / .Box-->
                  </div>
            </div>
            <!-- /.row-->
      </section>