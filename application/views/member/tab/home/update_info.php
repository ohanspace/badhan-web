<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title"> Update Info </h3>
  </div>
  <div class="panel-body">
	 <!--validation error start-->
	 <div style="<?php if(empty(validation_errors())){echo 'display:none';} ?>" class="alert alert-danger">
	 <p>Error:</p>
	 <span><?php echo validation_errors();?></span>
	 </div>                   


<form id="updateInfoForm" class="form-horizontal" role="form" method="post" action="<?php echo site_url('member/update_info')?>">
             		 <!--select current district-->
                    <div class="form-group">
                       <label for="district_id" class="col-md-4 control-label">Current District</label>
                       <div class="col-md-8">
                           <select class="form-control selectpicker" name="district_id">
                               
									<?php foreach ($districts as $district):?>
                                   <option value="<?php echo $district->district_id?>" <?php echo ($district->district_id == $member->district_id)?'selected':'';?>><?php echo $district->name?></option>
                                   <?php endforeach;?>
                               
                           </select>
                       </div>
                    </div>
                     <!--select thana-->
                    <div class="form-group">
                       <label for="thana_id" class="col-md-4 control-label">Thana :</label>
                       <div class="col-md-8">
                           <select class="form-control selectpicker" name="thana_id">
                           <option disabled selected value=NULL>Select Thana: </option>
                               
									<?php foreach ($thanas as $thana):?>
                                   <option value="<?php echo $thana->thana_id?>" <?php echo ($thana->thana_id == $member->thana_id)?'selected':'';?>><?php echo $thana->name.' | '.$thana->name_in_bangla?></option>
                                   <?php endforeach;?>
                               
                           </select>
                       </div>
                    </div>
                   
                    <!--birthday-->
                    
                    <div class="form-group">
                        <label for="birthday" class="col-md-4 control-label">Date of Birth: </label>
                        <div class="col-md-8">
                            <input type="text" class="form-control datepicker" name="birthday" value="<?php if(!empty_date($member->birthday)) echo set_value('birthday',$member->birthday);?>">
                        </div>
                    </div>
                   
                    <!--Name in English-->
                    
                    <div class="form-group">
                        <label for="name" class="col-md-4 control-label"> Name (In English): </label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="name" value="<?php echo set_value('name',$member->name);?>" placeholder="Your Name in bangla"  maxlength="100">
                        </div>
                    </div>   
                    <!--Name in bangla-->
                    
                    <div class="form-group">
                        <label for="name_in_bangla" class="col-md-4 control-label"> Name (In Bengali): </label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="name_in_bangla" value="<?php echo set_value('name_in_bangla',$member->name_in_bangla);?>" placeholder="Your Name in bangla"  maxlength="100">
                        </div>
                    </div>   
                       
                                                                       
                    <!--occupation-->
                    <div class="form-group">
                        <label for="occupation" class="col-md-4 control-label">Occupation: </label>
                        <div class="col-md-8">
                            <select class="form-control selectpicker" name="occupation">
                               <option disabled selected value=NULL>Select your occupation</option>
									<?php foreach (config_item('occupation') as $key => $value):?>
                                   <option value="<?php echo $key?>" <?php echo ($key == $member->occupation)?'selected':'';?>><?php echo $value?></option>
                                   <?php endforeach;?>                              
                           </select>
                        </div>
                    </div>  
                    
                     <!--email-->
                    <div class="form-group">
                        <label for="email" class="col-md-4 control-label">Email :</label>
                        <div class="col-md-8">
                            <input type="email" class="form-control"  name="email" value="<?php echo set_value('email',$member->email);?>">
                    	 </div>                    	
                    </div>
                    
                    <!--select blood group-->
                    <div class="form-group">
                       <label for="blood_group" class="col-md-4 control-label">Blood Group</label>
                       <div class="col-md-8">
                           <select class="form-control selectpicker" name="blood_group" id="blood_group">
                               
                               <?php foreach (config_item('blood_groups') as $key => $value):?>
                                   <option value="<?php echo $key?>" <?php echo ($key == $member->blood_group)?'selected':'';?>><?php echo $value?></option>
                                   <?php endforeach;?>  
                               <optgroup label="don't know?">
                                   <option value="NA">I Don't Know</option>
                               </optgroup>
                               
                           </select>
                       </div>
                    </div>
                                        
                    
                    <!--Last Donation Date-->                     
                    <div class="form-group">
                        <label for="last_donation_date" class="col-md-4 control-label">Last Donation Date</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control datepicker" name="last_donation_date" value="<?php echo set_value('last_donation_date',$member->last_donation_date);?>" placeholder="keep blank if no donation">
                        </div>
                    </div>
              
					<!--Literal Address-->
                    
                    <div class="form-group">
                        <label for="address" class="col-md-4 control-label"> Literal Address </label>
                        <div class="col-md-8">
                            <textarea class="form-control" name="address" value="<?php echo set_value('address',$member->address);?>" placeholder="eg: 27 azimpur coloni, dhaka"></textarea>
                        </div>
                    </div>  
                    
                    <!--Sign Up Submit Button --> 
                    <div class="form-group">                                                              
                        <div class="col-md-offset-4 col-md-8">
                            <input  type="submit" id="btn-update-info" name="submit_update_info" value="Save" class="btn btn-info">
                              
                        </div>
                    </div>
                                                                                   
            </form>
</div>
</div>

<?php if(isset($_POST))
	dump($_POST)?>




<script type="text/javascript">
 $(document).ready(function(){

	

	 });
</script>
