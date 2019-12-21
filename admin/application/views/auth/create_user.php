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
                                    <h1><?php echo lang('create_user_heading');?></h1>
                                    <p><?php echo lang('create_user_subheading');?></p>
                                    <?php if($message){?>
                                    <div class="callout callout-danger">
                                          <div id="infoMessage"><?php echo $message;?></div>
                                    </div>
                                    <?php }?>
                              </div>
                              <div class="box-body">
                                    <div class="row">
                                          <div class="col-xs-12 col-md-6 col-lg-4">
                                                <form action="create_user" method="post" autocomplete="off">
                                                      <p>
                                                            <input type="text" class="form-control" placeholder="First Name" name="first_name">
                                                      </p>

                                                      <p>
                                                      <input type="text" class="form-control" placeholder="Last Name" name="last_name">
                                                      
                                                      </p>
                                                      
                                                      <?php
                                                      if($identity_column!=='email') {
                                                      echo '<p>';
                                                      echo lang('create_user_identity_label', 'identity');
                                                      echo '<br />';
                                                      echo form_error('identity');
                                                      echo form_input($identity);
                                                      echo '</p>';
                                                      }
                                                      ?>

                                                      <p>
                                                      <input type="text" class="form-control" placeholder="Company Name" name="company">
                                                            
                                                      </p>

                                                      <p>
                                                            <input type="email" class="form-control" placeholder="Email" name="email" autocomplete="off">
                                                            
                                                      </p>

                                                      <p>
                                                      <input type="tel" class="form-control" placeholder="Telephone Number" name="phone" autocomplete="off">
                                                      
                                                      </p>

                                                      <p>
                                                            <input type="password" class="form-control" placeholder="Password" name="password" autocomplete="off">
                                                            
                                                      </p>

                                                      <p>
                                                      <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirm" autocomplete="off">
                                                      </p>

                                                      <button type="submit" class="btn btn-primary btn-block btn-flat" name="submit"><?php echo lang('create_user_submit_btn');?></button>
                                                </form>                                          
                                          </div>
                                    </div>
                              </div>
                        </div>
                        <!-- / .Box-->
                  </div>
            </div>
            <!-- /.row-->
      </section>
    </div>  

<?php $this->load->view('footer'); ?>