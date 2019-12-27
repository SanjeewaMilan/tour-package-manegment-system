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
        <!-- /.col -->
        <div class="col-lg-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Read Mail</h3>

              <div class="box-tools pull-right">
                <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Previous"><i class="fa fa-chevron-left"></i></a>
                <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Next"><i class="fa fa-chevron-right"></i></a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <h3><?php echo $contact_message[0]['co_subject'] ?></h3>
                <h5>From: <a href="mailto:<?php echo $contact_message[0]['co_email'] ?>"><?php echo $contact_message[0]['co_email'] ?></a> 
                  <span class="mailbox-read-time pull-right"><?php echo $contact_message[0]['co_date'] .' '. $contact_message[0]['co_time'] ?></span></h5>
              </div>
              <!-- /.mailbox-read-info -->
              <div class="mailbox-controls with-border text-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Delete">
                    <i class="fa fa-trash-o"></i></button>
                  <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Reply">
                    <i class="fa fa-reply"></i></button>
                  <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Forward">
                    <i class="fa fa-share"></i></button>
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Print">
                  <i class="fa fa-print"></i></button>
              </div>
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                <?php 
                $string = $this->typography->auto_typography($contact_message[0]['co_message']);
                echo  $string ;?>
              </div>
              <!-- /.mailbox-read-message -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              
            </div>
            <!-- /.box-footer -->
            <div class="box-footer">
              <div class="pull-right">
                <button type="button" class="btn btn-default"><i class="fa fa-reply"></i> Reply</button>
                <button type="button" class="btn btn-default"><i class="fa fa-share"></i> Forward</button>
              </div>
              <button type="button" class="btn btn-default" onclick="location.href='<?php echo base_url().'contact/delete_message/'.$contact_message[0]['contact_id'] ?>';"><i class="fa fa-trash-o"></i> Delete</button>
              <button type="button" class="btn btn-default"><i class="fa fa-print"></i> Print</button>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-lg-9">
          <?php  if($this->session->flashdata('add_comment')){?>
          <div class="callout callout-success"><?php  echo $this->session->flashdata('add_comment');
            $this->session->unset_userdata('add_comment');?> 
          </div> 
          <?php } ?>
        </div>
      </div>
  
      <div class="row">
        <!-- /.col -->
        <div class="col-lg-9">
          <div class="box box-primary">
            <!-- show comments -->
              <div class="box-header with-border">
                <h3 class="box-title">Comments</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body no-padding">
                <div class="mailbox-read-info">
                  <h4>Commented By :</h4>
                </div>
                <!-- /.mailbox-read-info -->
                <div class="mailbox-read-message">

                </div>
                <!-- /.mailbox-read-message -->
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" class="btn btn-default">Delete</button>
              </div>
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

    <section class="content">
      <div class="row">
        <!-- /.col -->
        <div class="col-lg-9">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"> Add Comments</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <!-- /.mailbox-read-info -->
              <div class="mailbox-read-message">
                <form action="<?php echo base_url();?>comments/add_comment/<?php echo $contact_message[0]['contact_id'] ?>" method="POST">
                <!-- textarea -->
                <div class="form-group">
                  <textarea class="form-control" rows="3" placeholder="Add Comment" name="comment"></textarea>
                </div> 
                <input type="hidden" class="form-control" name="date" id="date" value="<?php echo date("Y-m-d");?>" hidden>
                <input type="hidden" class="form-control" name="time" id="time" value="<?php date_default_timezone_set("Asia/Colombo"); echo date("H:i:s");?>" hidden>
              </div>
              <!-- /.mailbox-read-message -->
            <!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-default">Add Comment</button>
              </form>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
  </div>
  <!-- /.content-wrapper -->
<?php $this->load->view('footer'); ?> 