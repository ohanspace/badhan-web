<div class="container">
<!--sign up box start-->
  <div id="signupbox" style="margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
     <div class="panel panel-info">
         <div class="panel-heading">
                <div class="panel-title">Sign Up</div>
                <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="<?php echo site_url('member/login');?>">Sign In</a></div>
         </div>  
         <div class="panel-body" >
             
             <!--sign up form--> 
             <form id="signupform" class="form-horizontal" role="form" method="post" >
                    <!--validation error start-->
                    <div id="signupalert" style="<?php if(empty(validation_errors())){echo 'display:none';} ?>" class="alert alert-danger">
                        <p>Error:</p>
                        <span><?php echo validation_errors();?></span>
                    </div>                   

                    <!--Telephone-->
                    <div class="form-group">
                        <label for="telephone" class="col-md-4 control-label">Phone</label>
                        <div class="col-md-8">
                            <input type="tel" class="form-control" id="telephone" name="telephone" value="<?php echo set_value('telephone');?>" placeholder="01XXXXXXXXX" required pattern="^[0][1](1|5|6|7|8|9)\d{8}$">
                        </div>
                    </div>
                    
                   
                    <!--Name-->
                    <div class="form-group">
                        <label for="name" class="col-md-4 control-label">Your Name</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo set_value('name');?>" placeholder="Your Name" required maxlength="50">
                        </div>
                    </div>                                                         
                    <!--password-->
                    <div class="form-group">
                        <label for="password" class="col-md-4 control-label">Password</label>
                        <div class="col-md-8">
                            <input type="password" class="form-control" id="password" name="password" placeholder="New Password" required >
                        </div>
                    </div>  
                    
                     <!--Confirm password-->
                    <div class="form-group">
                        <label for="confirm_password" class="col-md-4 control-label">Confirm Password</label>
                        <div class="col-md-8">
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required >
                        </div>
                    </div>
                     
                    <!--select blood group-->
                    <div class="form-group">
                       <label for="blood_group" class="col-md-4 control-label">Blood Group</label>
                       <div class="col-md-8">
                           <select class="form-control selectpicker" name="blood_group" id="blood_group">
                               <option disabled selected value=NULL>Select Your Blood Group</option>
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
                               <optgroup label="don't know?">
                                   <option value="NA">I Don't Know My Group</option>
                               </optgroup>
                               
                           </select>
                       </div>
                    </div>
                    
                    <!--gender selection-->
                    <div class="form-group">
                        <label for="gender" class="col-md-4 control-label">Gender</label>
                        <div class="col-md-8">
                            <label class="radio-inline">
                                <input type="radio" name="gender" id="male" value="male" <?php echo set_radio('gender','male');?>> Male
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
                            <input type="text" class="form-control datepicker" id="last_donation_date" name="last_donation_date" value="<?php echo set_value('last_donation_date');?>" placeholder="keep blank if no donation">
                        </div>
                    </div>
              

                    
                    <!--Sign Up Submit Button --> 
                    <div class="form-group">                                                              
                        <div class="col-md-offset-4 col-md-8">
                            <button id="btn-signup" type="submit" formnovalidate class="btn btn-info"><span class="glyphicon glyphicon-ok"></span> &nbsp Sign Up</button>
                            <span style="margin-left:8px;">or</span>  
                        </div>
                    </div>

                    <div style="border-top: 1px solid #999; padding-top:20px"  class="form-group">

                        <div class="col-md-offset-4 col-md-8">
                            <a id="btn-fblogin" href="<?php echo site_url('member/register_with_facebook'); ?>" class="btn btn-primary">
                                <span class="glyphicon glyphicon-globe"></span>
                                &nbsp Sign Up with Facebook
                            </a>
                        </div>                                           

                    </div>
              </form>
          </div>
      </div>
   </div> 
</div>