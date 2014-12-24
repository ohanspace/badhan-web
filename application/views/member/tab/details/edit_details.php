<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title"> Personal Details </h3>
  </div>
  <div class="panel-body">
 <!--validation error start-->
 <div style="<?php if(empty(validation_errors())){echo 'display:none';} ?>" class="alert alert-danger">
 <p>Error:</p>
 <span><?php echo validation_errors();?></span>
 </div>                   


<form id="memberDetails" class="form-horizontal" role="form" method="post" >
             		 <!--Weight-->
                    <div class="form-group">
                        <label for="weight" class="col-md-4 control-label">Weight (Kg) :</label>
                        <div class="col-md-8">
                            <input type="number" class="form-control"  name="weight" value="<?php echo set_value('weight',$member->details->weight);?>" >
                    	 </div>                    	
                    </div>
                    
                    <!--Height-->
                    <div class="form-group">
                        <label for="height" class="col-md-4 control-label">Height :</label>
                        <div class="col-md-8">
                           <input type="text" class="form-control"  name="height" value="<?php echo set_value('height',$member->details->height);?>" placeholder="eg: 5'11''" >
                    	 </div>                    	
                    </div>
                    
             		
             		
             		 <!--select home district-->
                    <div class="form-group">
                       <label for="home_district_id" class="col-md-4 control-label">Home District</label>
                       <div class="col-md-8">
                           <select class="form-control selectpicker" name="home_district_id">
                               
									<?php foreach ($districts as $district):?>
                                   <option value="<?php echo $district->district_id?>" <?php echo ($district->district_id == $member->details->home_district_id)?'selected':'';?>><?php echo $district->name?></option>
                                   <?php endforeach;?>
                               
                           </select>
                       </div>
                    </div>
                    
                  
                    <!--Father Name-->
                    
                    <div class="form-group">
                        <label for="father_name" class="col-md-4 control-label"> Father Name: </label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="father_name" value="<?php echo set_value('father_name',$member->details->father_name);?>" placeholder="Father name"  maxlength="100">
                        </div>
                    </div>
                    
                    <!--mother Name -->
                    
                    <div class="form-group">
                        <label for="mother_name" class="col-md-4 control-label"> Mother Name: </label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="mother_name" value="<?php echo set_value('mother_name',$member->details->father_name);?>" placeholder="Mother name"  maxlength="100">
                        </div>
                    </div>   
                      
                      
                                                                       
                    <!--Marital Status-->
                    <div class="form-group">
                        <label for="marital_status" class="col-md-4 control-label">Marital Status: </label>
                        <div class="col-md-8">
                            <label class="radio-inline">
                                <input type="radio" name="marital_status"value="MARRIED" <?php echo set_radio('marital_status',$member->details->marital_status);?>> MARRIED
                            </label>
                            
                            <label class="radio-inline">
                                <input type="radio" name="marital_status" value="UNMARRIED" <?php echo set_radio('marital_status',$member->details->marital_status);?>> UNMARRIED
                            </label>
                          
                        </div>                           
                    </div>
                    
                     <!--Spouse Name -->
                    
                    <div class="form-group">
                        <label for="spouse_name" class="col-md-4 control-label"> Spouse Name: </label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="spouse_name" value="<?php echo set_value('spouse_name',$member->details->spouse_name);?>" placeholder="Spouse name"  maxlength="100">
                        </div>
                    </div>   
                    
                    
                    <!--about me-->
                    
                    <div class="form-group">
                        <label for="about_me" class="col-md-4 control-label"> About me: </label>
                        <div class="col-md-8">
                            <textarea class="form-control" name="about_me" value="<?php echo set_value('about_me',$member->details->about_me);?>" ></textarea>
                        </div>
                    </div>
                    
                    
                    <!--Sign Up Submit Button --> 
                    <div class="form-group">                                                              
                        <div class="col-md-offset-4 col-md-8">
                            <button type="submit"  class="btn btn-info"><span class="glyphicon glyphicon-ok"></span> &nbsp Save</button>
                              
                        </div>
                    </div>

                    

                                                                  

              </form>

</div>
</div>