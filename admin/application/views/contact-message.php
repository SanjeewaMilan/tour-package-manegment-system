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

            <!--  <div class="box-tools pull-right">
                <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Previous"><i class="fa fa-chevron-left"></i></a>
                <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Next"><i class="fa fa-chevron-right"></i></a>
              </div> -->
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
                <!-- <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Delete">
                    <i class="fa fa-trash-o"></i></button>
                  <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Reply">
                    <i class="fa fa-reply"></i></button>
                  <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Forward">
                    <i class="fa fa-share"></i></button>
                </div>
                <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Print">
                  <i class="fa fa-print"></i></button>
              </div> -->
              <!-- /.btn-group -->
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
              <div class="pull-right">
                <!-- <button type="button" class="btn btn-default"><i class="fa fa-print"></i> Print</button>-->
                <a href="<?php echo base_url().'contact/delete_message/'.$contact_message[0]['contact_id']?>"class="btn btn-danger" onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash-o"></i> Delete</a>
              </div>
              <!--reminder form -->
              <form action="<?php echo base_url().'contact/add_reminder/'.$contact_message[0]['contact_id']?>" method="POST">
              <?php $reminder_value = $contact_message[0]['co_reminder'];?>
                <div class="col-sm-4 col-lg-3 <?php 
                  if( $reminder_value =='Action not taken'){
                    echo 'form-group has-error';
                    }elseif($reminder_value =='Completed'){
                    echo 'form-group has-success';
                    }else{
                    echo 'form-group has-warning';
                    }?>">
                  <select class="form-control" name='reminder'>
                    <option value='Action not taken'>Action not taken</option>
                    <option value='Completed' <?php if( $reminder_value ==='Completed'){echo 'selected';}?>>Completed</option>
                    <option value='Follow Back' <?php if( $reminder_value ==='Follow Back'){echo ' selected';}?>>Follow Back</option>
                    <option value='Comment added' <?php if( $reminder_value ==='Comment added'){echo 'selected';}?>>Comment added</option>
                  </select >
                </div>
              <button type="submit" class="btn btn-primary"><i class="fa fa-clock-o"></i> Change Status</button>
              </form> <!-- end reminder form -->
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

        <div class="col-lg-9">
          <?php  if($this->session->flashdata('comment')){?>
          <div class="callout callout-success"><?php  echo $this->session->flashdata('comment');
            $this->session->unset_userdata('comment');?> 
          </div> 
          <?php } ?>

          <?php  if($this->session->flashdata('status')){?>
          <div class="callout callout-success"><?php  echo $this->session->flashdata('status');
            $this->session->unset_userdata('status');?> 
          </div> 
          <?php } ?>
        </div>


      

        <!-- /.col -->
        <div class="col-lg-9">
        <?php foreach ($message_comments as $comment){ 
            $count =1;
          ?>   
          <div class="box box-warning">
            <!-- show comments -->
              <div class="box-header with-border">
                  <?php echo 'Commented by : '.$comment->username;?>
                  <div class='pull-right mailbox-read-time'>
                    <?php echo $comment->comment_date; ?>
                    <?php echo $comment->comment_time; ?>
                  </div>
              </div>
              <!-- /.box-header -->
              
              <div class="box-body no-padding">
                <div class="mailbox-read-message">
                    <?php echo $comment->comment; ?>
                </div>
                <!-- /.mailbox-read-message -->
                
                <!-- /.mailbox-read-info -->
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url().'comments/delete/'.$comment->comment_id;?>"class="btn btn-danger" onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash-o"></i> Delete</a>
              </div>
          </div>
          <!-- /. box -->
        </div>
        <?php }?>
        <!-- /.col -->

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
                  <textarea class="form-control" rows="3" placeholder="Add Comment" name="comment" required></textarea>
                </div> 
                <input type="hidden" class="form-control" name="date" id="date" value="<?php echo date("Y-m-d");?>" hidden>
                <input type="hidden" class="form-control" name="time" id="time" value="<?php date_default_timezone_set("Asia/Colombo"); echo date("H:i:s");?>" hidden>
              </div>
              <!-- /.mailbox-read-message -->
            <!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Add Comment</button>
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