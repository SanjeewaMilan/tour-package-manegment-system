<?php $this->load->view('header');?>
<div class="grid-container">
    <h1>Ask for quote</h1>
                    <?php  if($this->session->flashdata('send_email')){?>
                            <div class="callout callout-success"><?php  echo $this->session->flashdata('send_email');
                                $this->session->unset_userdata('send_email');?> 
                            </div> 
                    <?php } ?>
                    <div class=" validation-errors"><?php echo validation_errors(); ?></div>
                    <form id="reservation-form" action="<?php echo base_url();?>reservation/send_mail" class="form form-email inputs-underline" method="post" parsley-validate>
                        <div class="grid-x grid-margin-x">
                            <div class="cell small-12 medium-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" value="<?php echo set_value('name'); ?>" required>
                                </div>
                            </div>

                            <div class="cell small-12 medium-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" value="<?php echo set_value('email'); ?>" required>
                                </div>
                            </div>
                        </div>

                        <div class="grid-x grid-margin-x">
                            <div class="cell small-12 medium-6">
                                <div class="form-group">
                                    <label for="tp">Telephone Number</label>
                                    <input type="text" class="form-control" name="tp" id="tp" value="<?php echo set_value('tp'); ?>">
                                </div>
                            </div>
                

                            <div class="cell small-12 medium-6">
                                <div class="form-group">
                                    <label for="country">Country</label>
                                    <input type="text" class="form-control" name="country" id="country" value="<?php echo set_value('country'); ?>" required>
                                </div>
                            </div>
                        </div>    

                        <h4>Reservation Details</h4>

                        <!-- tour type-->
                        <div class="grid-x grid-margin-x"> 
                            <div class="cell small-4 medium-4">
                                <div class="form-group">
                                    <label for="guide">Tour Type</label>
                                    <input id='tour_type-custom' type="radio" class="form-control" name="tour-type" value="Custom Made Tour" required> Custom
                                    <input id='tour_type-made' type="radio" class="form-control" name="tour-type" value="Pre Made Tour" required> Ready-made
                                </div>
                            </div>
                        </div>    <!-- end tour type-->

                        <!--custom tour -->
                        <div id="custom_tour">
                            <!--places-->
                            <h6>Places</h6>
                            <div class="grid-x grid-margin-x">
                                <?php foreach ($places as $place){ ?>
                                    <div class="cell small-4 medium-3">
                                        <div class="form-group">
                                            <input type="checkbox" name="place_name[]" value="<?php echo $place->place_id;?>"> <?php echo $place->place_name;?><br>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div><!--end places-->
                        </div><!--end custom tour -->

                        <!--ready-made tour -->
                        <div id="readymade_tour">
                            <div class="grid-x grid-margin-x">
                                <div class="cell small-4 medium-3">
                                    <div class="form-group">
                                        <select name="tour_package" required>
                                            <option value=" ">Select Tour package</option>
                                            <option value="1">tour-1</option>
                                            <option value="2">tour-2</option>
                                            <option value="3">tour-3</option>
                                            <option value="4">tour-4</option>
                                        </select>  
                                    </div>
                                </div>
                            </div><!--end places-->
                        </div><!--end ready-made tour -->

                        <div class="grid-x grid-margin-x">
                            <div class="cell small-12 medium-6">
                                <div class="form-group">
                                    <label for="arrival">Date Arrival</label>
                                    <input type="date" class="form-control" name="arrival" id="arrival" min="<?php echo date("Y-m-d");?>" value="<?php echo set_value('arrival'); ?>" required>
                                </div>
                            </div>
                            <div class="cell small-12 medium-6">
                                <div class="form-group">
                                    <label for="departure">Date Departure</label>
                                    <input type="date" class="form-control" name="departure" id="departure" min="<?php echo date("Y-m-d",strtotime(date("Y-m-d"). ' + 2 days'));?>" value="<?php echo set_value('departure'); ?>" required>
                                </div>
                            </div>
                        </div>
                        
                        <label>No of person</label>
                        <div class="grid-x grid-margin-x"> 
                            <div class="cell small-4 medium-4">
                                <div class="form-group">
                                    <label for="">Adult</label>
                                    <input type="number" class="form-control" name="adult" id="adult" min="2" value="<?php echo set_value('adult'); ?>" required>
                                </div>
                            </div>
                            
                            <div class="cell small-4 medium-4">
                                <div class="form-group">
                                    <label for="children">Children</label>
                                    <input type="number" class="form-control" name="children" id="children" min="0" value="<?php echo set_value('children'); ?>" >
                                </div>
                            </div>

                            <div class="cell small-4 medium-4">
                                <div class="form-group">
                                    <label for="">pets</label>
                                    <input type="number" class="form-control" name="pet" id="pet" min="0" value="<?php echo set_value('pet'); ?>" >
                                </div>
                            </div>
                        </div>

                        <div class="grid-x grid-margin-x"> 
                            <div class="cell small-4 medium-4">
                                <div class="form-group">
                                    <label for="guide">Guide assistence</label>
                                    <input id='guide_yes' type="radio" class="form-control" name="guide" value="Need" required> Yes
                                        <select id="language" name="language" >
                                            <option value="-">Select an your language</option>
                                            <option value="English">English</option>
                                            <option value="French">French</option>
                                            <option value="German">German</option>
                                            <option value="Japanese">Japanese</option>
                                        </select>
                                    <br>
                                    <input id='guide_no' type="radio" class="form-control" name="guide" value="No Need" required> No
                                </div>
                            </div>

                            <div class="cell small-4 medium-4">
                                <div class="form-group">
                                    <label for="accomadation">Accomadation Type</label>
                                        <select id="accomadation" name="accomadation">
                                            <option value="0">Select an accomadation type</option>
                                            <option value="Budget">Budget</option>
                                            <option value="Small Hotels">Small Hotels</option>
                                            <option value="2 to 3 star">2 to 3 star</option>
                                            <option value="Luxry">Luxry</option>
                                        </select>
                                </div>
                            </div>

                            <div class="cell small-4 medium-4">
                                <div class="form-group">
                                    <label for="meals">Meals Type</label>
                                        <select name="meals">
                                            <option value="0">Select meal type</option>
                                            <option value="1">a</option>
                                            <option value="2">b</option>
                                            <option value="3">c</option>
                                            <option value="4">d</option>
                                        </select>
                                </div>
                            </div>
                        </div>
                        

                        <div class="form-group">
                            <label for="requirments">Special requirments</label>
                            <textarea  type="text" class="form-control" id="requirments" rows="4" name="requirments" ><?php echo set_value('requirments'); ?></textarea>
                        </div>
                        <input type="hidden" class="form-control" name="date" id="date" value="<?php echo date("Y-m-d");?>" hidden>
                        <input type="hidden" class="form-control" name="time" id="time" value="<?php date_default_timezone_set("Asia/Colombo"); echo date("H:i:s");?>" hidden>
                        <input type="hidden" class="form-control" name="ip" id="ip" value="<?php echo $_SERVER['REMOTE_ADDR'];?>" hidden>

                        <!--user agent-->
                        <?php 
                            if ($this->agent->is_browser()){
                                    $agent = $this->agent->browser();
                            }
                            elseif ($this->agent->is_robot()){
                                    $agent = $this->agent->robot();
                            }
                            elseif ($this->agent->is_mobile()){
                                    $agent = $this->agent->mobile();
                            }
                            else{
                                    $agent = 'Unidentified User Agent';
                            }     
                        ?>

                        <input type="hidden" class="form-control" name="device" id="device" value="<?php echo $agent; ?>" >
                        
                        <?php ?>
                        <div class="form-group">
                            <button type="submit" class="button">Send Message</button>
                        </div>
                    </form>
</div>      

<?php $this->load->view('footer');?>