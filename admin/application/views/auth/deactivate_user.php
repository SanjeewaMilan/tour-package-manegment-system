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
                                <h1><?php echo lang('deactivate_heading');?></h1>
                                <p><?php echo sprintf(lang('deactivate_subheading'), $user->username);?></p>
                              </div>
                              <div class="box-body">
                                <?php echo form_open("auth/deactivate/".$user->id);?>

                                  <p>
                                    <?php echo lang('deactivate_confirm_y_label', 'confirm');?>
                                    <input type="radio" name="confirm" value="yes" checked="checked" />
                                    <?php echo lang('deactivate_confirm_n_label', 'confirm');?>
                                    <input type="radio" name="confirm" value="no" />
                                  </p>

                                  <?php echo form_hidden($csrf); ?>
                                  <?php echo form_hidden(['id' => $user->id]); ?>

                              </div>
                              <div class="box-footer">
                                <button type="submit" class="btn btn-primary" name="submit"><?php echo lang('deactivate_submit_btn');?></button>
                                <?php echo form_close();?>
                              </div>
                        </div>
                        <!-- / .Box-->
                  </div>
            </div>
            <!-- /.row-->
      </section>
    </div>  

<?php $this->load->view('footer'); ?>