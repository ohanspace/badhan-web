
  
     <div class="panel panel-info">
         <div class="panel-heading">
             <div class="panel-title">Add new member to <strong><?php echo $unit->name;?></strong></div>                
         </div>  
         <div class="panel-body" >
             
             <!--sign up form--> 
             <form  class="form-horizontal" role="form" method="post" >
                    <!--validation error start-->
                    <div id="alert" style="<?php if(empty(validation_errors())){echo 'display:none';} ?>" class="alert alert-danger">
                        <p>Error:</p>
                        <span><?php echo validation_errors();?></span>
                    </div>                   

                    <!--Telephone-->
                    <div class="form-group">
                        <label for="telephone" class="col-md-4 control-label">Phone</label>
                        <div class="col-md-6 phonelist">
                            <input type="tel" class="form-control" id="telephone" name="telephone" value="<?php echo set_value('telephone', $member_telephone->telephone);?>" placeholder="01XXXXXXXXX" required pattern="^[0][1](1|5|6|7|8|9)\d{8}$" maxlength="11">                           
                        </div>
                        <button id="telephone_check" type="button" class="btn btn-info">check</button>
                    </div>
                    
                    
                    <div id="existing_member" class="col-md-offset-4 col-md-8 alert alert-danger hide" ></div>
             
              <div id="member_form" class="hide">      
                    <!--Name-->
                    <div class="form-group">
                        <label for="name" class="col-md-4 control-label">Member Name</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo set_value('name', $member->name);?>" placeholder="member name" required maxlength="50">
                        </div>
                    </div>                                                                                            
                    <!--name in bangla-->                         
                    <div class="form-group">
                        <label for="name_in_bangla" class="col-md-4 control-label"> Name in Bangla</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="name_in_bangla" name="name_in_bangla" value="<?php echo set_value('name_in_bangla', $member->name_in_bangla);?>" placeholder="Name In bangla" required maxlength="50">
                        </div>
                    </div> 
                    <!--select blood group-->
                    <div class="form-group">
                       <label for="blood_group" class="col-md-4 control-label">Blood Group</label>
                       <div class="col-md-8">
                           <select class="form-control selectpicker" name="blood_group" id="blood_group">
                               <option disabled selected value="">Select Your Blood Group</option>
                               <optgroup label="Positive">
                                   <option value="O+" <?php echo set_select('blood_group','O+');?>>O+</option>
                                    <option value="A+" <?php echo set_select('blood_group','A+');?>>A+</option>
                                    <option value="B+" <?php echo set_select('blood_group','B+');?>>B+</option>
                                    <option value="AB+" <?php echo set_select('blood_group','AB+');?>>AB+</option>
                               <optgroup>
                               <optgroup label="Negative">
                                    <option value="O-" <?php echo set_select('blood_group','O-');?>>O-</option>
                                    <option value="A-" <?php echo set_select('blood_group','A-');?>>A-</option>
                                    <option value="B-" <?php echo set_select('blood_group','B-');?>>B-</option>
                                    <option value="AB-" <?php echo set_select('blood_group','AB-');?>>AB-</option>
                               </optgroup>                               
                               
                           </select>
                       </div>
                    </div>
                    
                    <!--gender selection-->
                    <div class="form-group">
                        <label for="gender" class="col-md-4 control-label">Gender</label>
                        <div class="col-md-8">
                            <label class="radio-inline">
                                <input type="radio" name="gender" id="male" value="male" <?php echo set_radio('gender','male',TRUE);?>> Male
                            </label>
                            
                            <label class="radio-inline">
                                <input type="radio" name="gender" id="female" value="female" <?php echo set_radio('gender','female');?>> Female
                            </label>
                          
                        </div>                           
                    </div>
                    
                    <!--Last Donation Date-->                     
                    <div class="form-group">
                        <label for="last_donation_date" class="col-md-4 control-label">Last Donation Date</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control datepicker" id="last_donation_date" name="last_donation_date" value="<?php echo set_value('last_donation_date', $member->last_donation_date);?>" placeholder="keep blank if no donation">
                        </div>
                    </div>
                    <!--Total donation-->                  
                    <div class="form-group">
                        <label for="total_donation" class="col-md-4 control-label">Total donation</label>
                        <div class="col-md-8">
                            <input type="number" class="form-control" id="total_donation" name="total_donation" value="<?php echo set_value('total_donation', $member->total_donation);?>" placeholder="total donation" >
                        </div>
                    </div>
                    <!--eagerness scale-->
                    
                    
                   
                    
                    <!--room no-->                  
                    <div class="form-group">
                        <label for="room_no" class="col-md-4 control-label">room no</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="room_no" name="room_no" value="<?php echo set_value('room_no', $member->room_no);?>" placeholder="room number" required maxlength="15">
                        </div>
                    </div>
                    
                    <!--student id-->
                    <div class="form-group">
                        <label for="student_id" class="col-md-4 control-label">Student ID</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="student_id" name="student_id" value="<?php echo set_value('room_no', $member->room_no);?>" placeholder="studnet id" required maxlength="15">
                        </div>
                    </div>
                    
                    <!--year-->
                    <div class="form-group">
                       <label for="year" class="col-md-4 control-label">Year</label>
                       <div class="col-md-8">
                           <select class="form-control selectpicker" name="year" id="year">
                               <option disabled selected value="">Select year </option>
                               <option value="FIRST">FIRST</option>
                               <option value="SECOND">SECOND</option>
                               <option value="THIRD">THIRD</option>
                               <option value="FOURTH">FOURTH</option>
                               
                           </select>
                       </div>
                    </div>
                    
                    <!--batch-->                
                    <div class="form-group">
                        <label for="batch" class="col-md-4 control-label">Batch</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="batch" name="batch" value="<?php echo set_value('batch', $member->batch);?>" placeholder="batch" required maxlength="5">
                        </div>
                    </div>
                    
                    <!--address-->
                    
                    <!-- Submit Button --> 
                    <div class="form-group">                                                              
                        <div class="col-md-offset-4 col-md-8">
                            <button id="btn-signup" type="submit" formnovalidate class="btn btn-info"><span class="glyphicon glyphicon-ok"></span> &nbsp Save</button>
                            
                        </div>
                    </div>

                    
              </form>
             </div>
          </div>
      </div>
  
