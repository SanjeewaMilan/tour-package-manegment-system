<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
    $this->load->view('header');
    $this->load->view('sidebar');
?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Contact data
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
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Inbox</h3>

              <div class="box-tools pull-right">
                <div class="has-feedback">
                  <input type="text" class="form-control input-sm" placeholder="Search Mail">
                  <span class="glyphicon glyphicon-search form-control-feedback"></span>
                </div>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
               <!--   <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button> -->
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                <div class="pull-right">
                  1-50/<?php echo count($contact_data);?>
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                  </div>
                  <!-- /.btn-group -->
                </div>
                <!-- /.pull-right -->
              </div>
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
                  <?php foreach ($contact_data as $val){?> 
                  <tr class="clickable-row" data-href="<?php echo'contact/message/'.$val['contact_id'];?>">
                    <td><input type="checkbox"></td>
                    <!--<td class="mailbox-star"><a href=""><i class="fa fa-star text-yellow"></i></a></td>-->
                    <td class="mailbox-name"><a href="<?php echo base_url().'contact/message/'.$val['contact_id'];?>"><?php echo $val['co_name']; ?></a></td>
                    <td><span class="badge <?php 
                      $reminder_value = $val['co_reminder'] ;
                    if( $reminder_value =='Action not taken'){
                      echo 'bg-red';
                    }elseif($reminder_value =='Completed'){
                      echo 'bg-green';
                    }elseif($reminder_value =='Comment added'){
                      echo 'bg-blue';
                    }else{
                      echo 'bg-yellow';
                    }?>"><?php echo $val['co_reminder']; ?></span></td>
                    <td class="mailbox-subject"><b><?php echo $val['co_subject'].'</b> - '. substr($val['co_message'], 0, 80).'...'; ?>
                    </td>
                    <td><span class="label label-success"><?php echo $val['co_status']; ?></span></td>
                    <td class="mailbox-date"><?php echo $val['co_date']; ?></td>
                    <td> <i class="fa fa-comments"></i><?php echo ' '.$val['comment_count'];?></td>
                  </tr>
                  <?php }?>
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
               <!--   <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button> -->
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                <div class="pull-right">
                  1-50/<?php echo count($contact_data);?>
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                  </div>
                  <!-- /.btn-group -->
                </div>
                <!-- /.pull-right -->
              </div>
            </div>
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->




<?php $this->load->view('footer'); ?>