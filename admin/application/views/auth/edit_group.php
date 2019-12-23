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
                              <div class="row">
                                    <div class="col-xs-12 col-md-6 col-lg-4">
                                          <div class="box-header">
                                          <h1><?php echo lang('edit_group_heading');?></h1>
                                                <p><?php echo lang('edit_group_subheading');?></p>                                                
                                          </div><!-- / .Box header-->
                                          <div class="box-body">
                                          <?php echo form_open(current_url());?>

                                          <p>
                                                <?php echo lang('edit_group_name_label', 'group_name');?> <br />
                                                <input type="text" class="form-control" placeholder="" name="group_name" value="<?php echo ($group_name['value']);?>">
                                                <?php //echo form_input($group_name);?>
                                          </p>

                                          <p>
                                                <?php echo lang('edit_group_desc_label', 'description');?> <br />
                                                <input type="text" class="form-control" placeholder="" name="group_description" value="<?php echo ($group_description['value']);?>">
                                                <?php //echo form_input($group_description);?>
                                          </p>
                                                                                    
                                          </div><!-- / .Box body-->
                                          <div class="box-footer">
                                                <button type="submit" class="btn btn-primary " name="submit"><?php echo lang('edit_group_submit_btn');?></button>
                                                <?php echo form_close();?>
                                          </div><!-- / .Box footer-->
                                          
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



<div id="infoMessage"><?php echo $message;?></div>

