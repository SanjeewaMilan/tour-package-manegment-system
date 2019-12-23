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
                                                <h1><?php echo lang('edit_user_heading');?></h1>
                                                <p><?php echo lang('edit_user_subheading');?></p>

                                                <div id="infoMessage"><?php echo $message;?></div>
                                          </div><!-- / .Box header-->
                                          <div class="box-body">
                                                
                                          <?php echo form_open(uri_string());?>

                                                <p>
                                                      <?php echo lang('edit_user_fname_label', 'first_name');?> <br />
                                                      <?php //echo form_input($first_name);?>
                                                      <input type="text" class="form-control" placeholder="" name="first_name" value="<?php echo ($first_name['value']);?>">
                                                </p>

                                                <p>
                                                      <?php echo lang('edit_user_lname_label', 'last_name');?> <br />
                                                      
                                                      <input type="text" class="form-control" placeholder="" name="last_name" value="<?php echo ($last_name['value']);?>">
                                                </p>

                                                <p>
                                                      <?php echo lang('edit_user_company_label', 'company');?> <br />
                                                      <input type="text" class="form-control" placeholder="" name="company" value="<?php echo ($company['value']);?>">
                                                </p>

                                                <p>
                                                      <?php echo lang('edit_user_phone_label', 'phone');?> <br />
                                                      <input type="text" class="form-control" placeholder="" name="phone" value="<?php echo ($phone['value']);?>">
                                                </p>

                                                <p>
                                                      <?php echo lang('edit_user_password_label', 'password');?> <br />
                                                      <?php echo form_input($password);?>
                                                </p>

                                                <p>
                                                      <?php echo lang('edit_user_password_confirm_label', 'password_confirm');?><br />
                                                      <?php echo form_input($password_confirm);?>
                                                </p>

                                                <?php if ($this->ion_auth->is_admin()): ?>

                                                <h3><?php echo lang('edit_user_groups_heading');?></h3>
                                                <?php foreach ($groups as $group):?>
                                                   <div class="checkbox">
                                                      <label>
                                                      <?php
                                                            $gID=$group['id'];
                                                            $checked = null;
                                                            $item = null;
                                                            foreach($currentGroups as $grp) {
                                                            if ($gID == $grp->id) {
                                                                  $checked= ' checked="checked"';
                                                            break;
                                                            }
                                                            }
                                                      ?>
                                                      
                                                      <input type="checkbox"  name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
                                                      <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
                                                      </label>
                                                   </div>
                                                <?php endforeach?>
                                                <?php endif ?>

                                                <?php echo form_hidden('id', $user->id);?>
                                                <?php echo form_hidden($csrf); ?>

                                          </div><!-- / .Box body-->
                                          <div class="box-footer">

                                                <button type="submit" class="btn btn-primary " name="submit"><?php echo lang('edit_user_submit_btn');?></button>
                                 
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
