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
        Reservation
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
                <h3><b><?php echo $reservation_data[0]['res_name'] ?></b></h3>
                <h5>Email: <a href="mailto:<?php echo $reservation_data[0]['res_email'] ?>"><?php echo $reservation_data[0]['res_email'] ?></a>
                <h5>Telephone: <a href="tel:<?php echo $reservation_data[0]['res_telephone'] ?>"><?php echo $reservation_data[0]['res_telephone'] ?></a>
                <h5>Country:<?php echo $reservation_data[0]['res_country'] ?>

                <span class="mailbox-read-time pull-right"><?php echo $reservation_data[0]['res_date'] .' '. $reservation_data[0]['res_time'] ?></span></h5>
              </div>
              <!-- /.mailbox-read-info -->
              <div class="mailbox-controls with-border">
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                <table class="table table-bordered">
                    <tr>
                        <td width="20%"><b>Tour Package Type</b></td>
                        <td colspan="3"><?php echo $reservation_data[0]['res_tour_package_type'];?><?php if($reservation_data[0]['res_tour_package_type'] == 'Pre Made Tour'){echo '<a href="#"> - '.$reservation_data[0]['res_tour_package_id'].'</a>';}?></td>
                    </tr>
                    <tr>
                        <td> <b>Arrival Date</b> </td>
                        <td colspan="3"><?php echo $reservation_data[0]['res_arival_date'];?></td>
                    </tr>
                    <tr>
                        <td><b>Departure Date</b></td>
                        <td colspan="3"><?php echo $reservation_data[0]['res_departure_date'];?></td>
                    </tr>
                    <tr>
                        <td><b>No of Person</b></td>
                        <td><?php echo $reservation_data[0]['res_adults'].' adults';?></td>
                        <td><?php echo $reservation_data[0]['res_children'].' childrens';?></td>
                        <td><?php echo $reservation_data[0]['res_pets'].' pets';?></td>
                    </tr>
                    <tr>
                        <td><b>Places</b></td>
                        <td colspan="3"><?php if($reservation_data[0]['res_tour_package_id'] == 0){foreach($reservation_data[0]['place_name'] as $val){echo $val.' / ';}}?></td>
                    </tr>
                    <tr>
                        <td><b>Guide Assistence</b></td>
                        <td ><?php echo $reservation_data[0]['res_guide_assistance'];?></td>
                        <td><b>Language</b></td>
                        <td><?php echo $reservation_data[0]['res_guide_language'];?></td>
                    </tr>
                    <tr>
                        <td><b>Accomadation Type</b></td>
                        <td colspan="3"><?php echo $reservation_data[0]['res_accomadation_type'];?></td>
                    </tr>
                    <tr>
                        <td><b>Meal Type</b></td>
                        <td colspan="3"><?php echo $reservation_data[0]['res_meals_type'];?></td>
                    </tr>
                    <tr>
                        <td><b>Special requirments</b></td>
                        <td colspan="3"><?php 
                        $string = $this->typography->auto_typography($reservation_data[0]['res_message']);
                        echo $string;?></td>
                    </tr>
                    <tr>
                        <td><b>IP address</b></td>
                        <td><?php echo $reservation_data[0]['res_ip'];?></td>
                        <td><b>Country of IP</b></td>
                        <td><?php echo $reservation_data[0]['res_ip_country'];?></td>
                    </tr>
                </table>
              </div>
              <!-- /.mailbox-read-message -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <div class="pull-right">
                <!-- <button type="button" class="btn btn-default"><i class="fa fa-print"></i> Print</button>-->
                <a href="<?php echo base_url().'reservation/delete_reservation/'.$reservation_data[0]['res_id']?>"class="btn btn-danger" onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash-o"></i> Delete</a>
              </div>
              <!--reminder form -->
              <form action="<?php echo base_url().'reservation/change_status/'.$reservation_data[0]['res_id']?>" method="POST">
              <?php $reminder_value = $reservation_data[0]['res_status'];?>
                <div class="col-sm-4 col-lg-3 <?php 
                  if( $reminder_value =='Pending'){
                    echo 'form-group has-error';
                    }elseif($reminder_value =='Completed'){
                    echo 'form-group has-success';
                    }else{
                    echo 'form-group has-warning';
                    }?>">
                  <select class="form-control" name='status'>
                    <option value='Pending'>Pending</option>
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

        <!-- /.col -->
        <div class="col-lg-9">
        <?php foreach ($message_comments as $comment){ 
            $count =1;
          ?>   
          <div class="box box-warning">
            <!-- show comments -->
              <div class="box-header with-border">
                  <?php echo 'Commented by : '.$comment->username;?>
                  <?php 
                    if($comment->comment_edit_user_id !=NULL){
                      echo '<br>Edited by : '.$comment->edit_user;
                    }
                  ?>
                  <div class='pull-right mailbox-read-time'>
                    <?php echo $comment->comment_date; ?>
                    <?php echo $comment->comment_time; ?>
                  </div>
              </div>
              <!-- /.box-header -->
              
              <div class="box-body no-padding">
              <form action="<?php echo base_url().'comments/update/'.$comment->comment_id;?>" method="POST">
                <div class="mailbox-read-message">
                   <p id='comment-<?php echo $comment->comment_id;?>'><?php echo $comment->comment; ?></p>
                   <input type="text" id="input_comment-<?php echo $comment->comment_id;?>" name='input_comment' class="form-control" value="<?php echo $comment->comment; ?>">
                </div>
                <!-- /.mailbox-read-message -->
                <!-- /.mailbox-read-info -->
              <!-- /.box-body -->
              <div id="comment_box-<?php echo $comment->comment_id;?>" class="box-footer">
                <a href="<?php echo base_url().'comments/delete/'.$comment->comment_id;?>"class="btn btn-danger" onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash-o"></i> Delete</a>
                <a id ="btn_comment_edit-<?php echo $comment->comment_id;?>" class="btn btn-primary" ><i class="fa fa-edit"></i> Edit</a>
                <!--<a id="btn_commet_save" href="" class="btn btn-success"><i class="fa fa-edit"></i> Save</a>
                <a id="btn_cancel" onclick="location.reload()" class="btn btn-default"><i class="fa fa-edit"></i> Cancel</a> -->
              </div>
              </form>
          </div>
          <script>
              $("#input_comment-<?php echo $comment->comment_id;?>").hide();
            $("#btn_comment_edit-<?php echo $comment->comment_id;?>").click(function(){         
              $("#input_comment-<?php echo $comment->comment_id;?>").show();
              $('#comment_box-<?php echo $comment->comment_id;?>').html('<button type="submit" class="btn btn-success"><i class="fa fa-edit"></i> Save</button> <a id="btn_cancel" onclick="location.reload()" class="btn btn-default"><i class="fa fa-edit"></i> Cancel</a>');
              $("#comment-<?php echo $comment->comment_id;?>").remove();
            });
          </script>
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
                <form action="<?php echo base_url();?>comments/add_comment/<?php echo $reservation_data[0]['res_id'] ?>" method="POST">
                <!-- textarea -->
                <div class="form-group">
                  <textarea class="form-control" rows="3" placeholder="Add Comment" name="comment" required></textarea>
                </div> 
                <input type="hidden" class="form-control" name="type" id="type" value="reservation" hidden>
                <input type="hidden" class="form-control" name="date" id="date" value="<?php echo date("Y-m-d");?>" hidden>
                <input type="hidden" class="form-control" name="time" id="time" value="<?php date_default_timezone_set("Asia/Colombo"); echo date("H:i:s");?>" hidden>
              </div>
              <!-- /.mailbox-read-message -->
                <!-- /.box-body -->
                <div class="box-footer">
                <button type="submit" class="btn btn-primary">Add Comment</button>
                </div>
                <!-- /.box-footer -->
              </form>
            
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