<div class="panel panel-info">
    <!--panel heading-->
         <div class="panel-heading">
                <div class="panel-title"><?php echo empty($family->family_id) ? 'Add a new family' : 'Edit family: ' .'<strong>'. $family->name.'</strong>'; ?></div>
                <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="<?php echo site_url('admin/family');?>">All Familys</a></div>
         </div>
    <!--panel body-->
         <div class="panel-body" >                        
             <form id="family-edit-form" class="form-horizontal" role="form" method="post" action="<?php echo current_url(); ?>" >
                <!--validation error-->
                <div id="signupalert" style="<?php if(empty(validation_errors())){echo 'display:none';} ?>" class="alert alert-danger">
                    <p>Error:</p>
                    <span><?php echo validation_errors();?></span>
                </div>                   
                <!--Name-->
                <div class="form-group">
                    <label for="name" class="col-md-4 control-label">Name</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $family->name;?>" placeholder="Family Name" required maxlength="100">
                    </div>
                </div>
                <!--Name In Bangla-->
                <div class="form-group">
                    <label for="name_in_bangla" class="col-md-4 control-label">Name In Bangla</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="name_in_bangla" name="name_in_bangla" value="<?php echo $family->name_in_bangla;?>" placeholder="Name In Bangla" required maxlength="100">
                    </div>
                </div>
                <!--Short Name-->
                <div class="form-group">
                    <label for="short_name" class="col-md-4 control-label">Short Name</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="short_name" name="short_name" value="<?php echo $family->short_name;?>" placeholder="Short Name" required maxlength="100">
                    </div>
                </div>
                <!--Select Institution-->
                <div class="form-group">
                   <label for="institution_id" class="col-md-4 control-label">Select Institution</label>
                   <div class="col-md-8">
                       <select class="form-control selectpicker"  id="institution_id" name="institution_id" title='Choose the institution'>
                           <option disabled selected value=NULL>Select Institution</option>
                           <?php if(isset($institutions)): ?>
                                <?php if(count($institutions['UNIVERSITIES'])) : ?>
                                        <optgroup label="Universities">
                                            <?php foreach ($institutions['UNIVERSITIES'] as $university): ?>
                                                <option value="<?php echo $university->institution_id ?>" <?php echo set_select('institution_id',$university->institution_id,$university->institution_id==$family->institution_id?TRUE:FALSE);?> ><?php echo $university->name; ?></option>
                                            <?php endforeach; ?>
                                        </optgroup>
                                <?php endif;?>
                                <?php if(count($institutions['COLLEGES'])) : ?>
                                    <optgroup label="Colleges">
                                        <?php foreach ($institutions['COLLEGES'] as $college): ?>
                                            <option value="<?php echo $college->institution_id ?>" <?php echo set_select('institution_id',$college->institution_id,$college->institution_id==$family->institution_id?TRUE:FALSE);?> ><?php echo $college->name; ?></option>
                                        <?php endforeach; ?>
                                    </optgroup>
                                <?php endif;?>
                               <?php if(count($institutions['UNIVERSITYCOLLEGES'])) : ?>
                                    <optgroup label="University Colleges">
                                        <?php foreach ($institutions['UNIVERSITYCOLLEGES'] as $universitycollege): ?>
                                            <option value="<?php echo $universitycollege->institution_id ?>" <?php echo set_select('institution_id',$universitycollege->institution_id,$universitycollege->institution_id==$family->institution_id?TRUE:FALSE);?> ><?php echo $universitycollege->name; ?></option>
                                        <?php endforeach; ?>
                                    </optgroup>
                                <?php endif;?>
                           <?php endif;?>                                                                                                                        
                       </select>
                    </div>
                </div>
                
                <!--Select Zone-->
                <div class="form-group">
                   <label for="zone_id" class="col-md-4 control-label">Select Zone</label>
                   <div class="col-md-8">
                       <select class="form-control selectpicker" name="zone_id" id="zone_id">
                           <option value >Central</option>
                           <?php if(isset($zones)): foreach ($zones as $zone): ?>
                           <option value="<?php echo $zone->zone_id ?>" <?php echo set_select('zone_id',$zone->zone_id,$zone->zone_id == $family->zone_id?TRUE:FALSE);?> ><?php echo $zone->name; ?></option>
                           <?php endforeach; endif; ?>
                       </select>
                   </div>
               </div>
                <!--Date of establishment-->                     
                <div class="form-group">
                    <label for="estd" class="col-md-4 control-label">Date of establishment</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control datepicker" id="estd" name="estd" value="<?php echo set_value('estd', $office_info->estd);?>" placeholder="Established Date">
                    </div>
                </div>              
               <!--Address-->
                <div class="form-group">
                    <label for="address" class="col-md-4 control-label">Address</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="address" name="address" value="<?php echo set_value('address', $office_info->address);?>" placeholder="Address">
                    </div>
                </div>
               <!--Address2-->
                <div class="form-group">
                    <label for="address2" class="col-md-4 control-label">Address 2</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="address2" name="address2" value="<?php echo set_value('address2', $office_info->address2);?>" placeholder="Optional Address">
                    </div>
                </div>
               <!--Facebook page-->
                <div class="form-group">
                    <label for="fb_page_link" class="col-md-4 control-label">facebook page link</label>
                    <div class="col-md-8">
                        <input type="url" class="form-control" id="fb_page_link" name="fb_page_link" value="<?php echo set_value('fb_page_link',$office_info->fb_page_link);?>" placeholder="facebook page link">
                    </div>
                </div>
               <!--Facebook group-->
                <div class="form-group">
                    <label for="fb_group_link" class="col-md-4 control-label">facebook group link</label>
                    <div class="col-md-8">
                        <input type="url" class="form-control" id="fb_group_link" name="fb_group_link" value="<?php echo set_value('fb_group_link',$office_info->fb_group_link); ?>" placeholder="facebook group link">
                    </div>
                </div>
                <!--Email-->
                <div class="form-group">
                    <label for="email" class="col-md-4 control-label">Email</label>
                    <div class="col-md-8">
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo set_value('email',$office_info->email);?>" placeholder="Email Address">
                    </div>
                </div>                                         
                <!--Telephone-->
                <div class="form-group">
                    <label for="telephone" class="col-md-4 control-label">Phone</label>
                    <div class="col-md-8">
                        <input type="tel" class="form-control" id="telephone" name="telephone" value="<?php echo set_value('telephone', $office_info->telephone);?>" placeholder="telephone no.">
                    </div>
                </div>
                <!--Telephone2-->
                <div class="form-group">
                    <label for="telephone2" class="col-md-4 control-label">Phone 2</label>
                    <div class="col-md-8">
                        <input type="tel" class="form-control" id="telephone2" name="telephone2" value="<?php echo set_value('telephone2', $office_info->telephone2);?>" placeholder="telephone no. 2">
                    </div>
                </div>
                <!--Telephone3-->
                <div class="form-group">
                    <label for="telephone3" class="col-md-4 control-label">Phone 3</label>
                    <div class="col-md-8">
                        <input type="tel" class="form-control" id="telephone3" name="telephone3" value="<?php echo set_value('telephone3', $office_info->telephone3);?>" placeholder="telephone no. 3">
                    </div>
                </div>
                <!--Office open time-->
                <div class="form-group">
                    <label for="office_open_time" class="col-md-4 control-label">Office Open Time</label>
                    <div class="col-md-8">
                        <input type="time" class="form-control timepicker" id="office_open_time" name="office_open_time" value="<?php echo set_value('office_open_time', $office_info->office_open_time); ?>" step="900">
                    </div>
                </div>                   
                <!--Office Close time-->
                <div class="form-group">
                    <label for="office_close_time" class="col-md-4 control-label">Office Close Time</label>
                    <div class="col-md-8">
                        <input type="time" class="form-control timepicker" id="office_close_time" name="office_close_time" value="<?php echo set_value('office_close_time', $office_info->office_close_time); ?>" step="900">
                    </div>
                </div>                    
                <!--Geolocation-->
                <div class="form-group">
                    <label for="geolocation" class="col-md-4 control-label">Geolocation</label>
                    <div class="col-md-8">
                        <input type="text" name="geolocation[latitude]" id="latitude" readonly="readonly" value="<?php echo set_value('geolocation[latitude]',$geolocation->latitude); ?>" required/>
                        <input type="text" name="geolocation[longitude]" id="longitude" readonly="readonly" value="<?php echo set_value('geolocation[longitude]',$geolocation->longitude); ?>" required/>
                    </div>
                </div>


                <!--Family Save Button --> 
                <div class="form-group">                                                              
                    <div class="col-md-offset-4 col-md-8">
                        <button id="btn-save" type="submit" class="btn btn-success"><i class="glyphicon glyphicon-ok"></i> &nbsp Save</button>
                        <span style="margin-left:8px;"></span>
                        <a id="btn-cancel" href="<?php echo site_url('admin/family');?>" class="btn btn-info"><i class="glyphicon glyphicon-remove"></i>&nbsp Cancel</a>
                    </div>
                </div>                  
              </form>
          </div>
      </div>

 
<!--map start-->
    <input id="pac-input" class="controls" type="text"
        placeholder="Enter a location">
    <div id="map-canvas" style="height: 400px; width: 700px;">
    </div>
<!--map closed-->
    

    
   
