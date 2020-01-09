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
        Reservation data
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
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
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
                  <!--<div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                  </div>-->
                  <!-- /.btn-group -->
                </div>
                <!-- /.pull-right -->
              </div>
              <div class="table-responsive mailbox-messages no-padding">
                <table id="example2" class="table table-hover table-striped">
                  <thead>
                  <tr>
                    <th></th>
                    <th>No</th>
                    <th>Status</th>
                    <th>Sender</th>
                    <th></th>
                    <th>Date</th>
                    <th>Comments</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php //var_dump($reservation_data);?>
                  <?php foreach ($reservation_data as $val){?> 
                  <tr class="clickable-row" data-href="<?php echo'reservation/message/'.$val['res_id'];?>">
                    <td><input type="checkbox"></td>
                    <!--<td class="mailbox-star"><a href=""><i class="fa fa-star text-yellow"></i></a></td>-->
                    <td class="mailbox-name"><a href="<?php echo base_url().'reservation/message/'.$val['res_id'];?>"><?php echo 'Reservation 00'.$val['res_id']; ?></a></td>
                    <td><span class="badge <?php 
                      $reminder_value = $val['res_status'] ;
                    if( $reminder_value =='Pending'){
                      echo 'bg-red';
                    }elseif($reminder_value =='Completed'){
                      echo 'bg-green';
                    }elseif($reminder_value =='Comment added'){
                      echo 'bg-blue';
                    }else{
                      echo 'bg-yellow';
                    }?>"><?php echo $val['res_status']; ?></span></td>
                    <td class="mailbox-subject"><b><?php echo $val['res_name']?> </b> - <?php echo $val['res_email']?>
                    </td>
                    <td><span class="label label-success"><?php echo $val['res_auto_status']; ?></span></td>
                    <td class="mailbox-date"><?php echo $val['res_date']; ?></td>
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
                <!--<div class="pull-right">
                  1-50/<?php //echo count($reservation_data);?>
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                  </div>-->
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