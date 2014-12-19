<div class="panel panel-info">
    <!--panel heading-->
     <div class="panel-heading">
            <div class="panel-title"><?php echo empty($hospital->hospital_id) ? 'Add a new hospital' : 'Edit hospital: ' .'<strong>'. $hospital->name.'</strong>'; ?></div>
            <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="<?php echo site_url('admin/hospital');?>">All Hospitals</a></div>
     </div>
    <!--panel body-->
     <div class="panel-body" >                        
         <form id="hospital-edit-form" class="form-horizontal" role="form" method="post" action="<?php echo current_url(); ?>" >
            <!--validation error-->
            <div id="signupalert" style="<?php if(empty(validation_errors())){echo 'display:none';} ?>" class="alert alert-danger">
                <p>Error:</p>
                <span><?php echo validation_errors();?></span>
            </div>                   
            <!--Name-->
            <div class="form-group">
                <label for="name" class="col-md-4 control-label">Name</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo set_value('name',$hospital->name);?>" placeholder="Hospital Name" required maxlength="100">
                </div>
            </div>
            <!--Name In Bangla-->
            <div class="form-group">
                <label for="name_in_bangla" class="col-md-4 control-label">Name In Bangla</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="name_in_bangla" name="name_in_bangla" value="<?php echo set_value('name_in_bangla',$hospital->name_in_bangla);?>" placeholder="Name In Bangla" required maxlength="100">
                </div>
            </div>
            <!--Short Name-->
            <div class="form-group">
                <label for="short_name" class="col-md-4 control-label">Short Name</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="short_name" name="short_name" value="<?php echo set_value('short_name',$hospital->short_name); ?>" placeholder="Short Name"  maxlength="50">
                </div>
            </div>
            <!--Hospital Type-->
            <div class="form-group">
               <label for="type" class="col-md-4 control-label">Hospital Type</label>
               <div class="col-md-8">
                   <select class="form-control selectpicker" name="type" id="type">
                       <option value="PUBLIC" <?php echo set_select('type','PUBLIC');?>>Public</option>
                       <option value="PRIVATE" <?php echo set_select('type','PRIVATE');?>>Private</option>                  
                   </select>
               </div>
           </div>
           <!--Select District-->
           <div class="form-group">
               <label for="district_id" class="col-md-4 control-label">Select District</label>
               <div class="col-md-8">
                   <select class="form-control selectpicker" name="district_id" id="district_id">
                       <option disabled selected>Select District</option>
                       <?php if(isset($districts)): foreach ($districts as $district): ?>
                       <option value="<?php echo $district->district_id ?>" <?php echo set_select('district_id',$district->district_id,$district->district_id == $hospital->district_id?TRUE:FALSE);?> ><?php echo $district->name; ?></option>
                       <?php endforeach; endif; ?>
                   </select>
               </div>
           </div>
           <!--Address-->
            <div class="form-group">
                <label for="address" class="col-md-4 control-label">Address</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="address" name="address" value="<?php echo set_value('address',$hospital->address); ?>" placeholder="Address">
                </div>
            </div>           
           <!--Geolocation-->
            <div class="form-group">
                <label for="geolocation" class="col-md-4 control-label">Geolocation</label>
                <div class="col-md-8">
                    <input type="text" name="geolocation[latitude]" id="latitude" readonly="readonly" value="<?php echo set_value('geolocation[latitude]',$geolocation->latitude); ?>" />
                    <input type="text" name="geolocation[longitude]" id="longitude" readonly="readonly" value="<?php echo set_value('geolocation[longitude]',$geolocation->longitude); ?>" />
                </div>
            </div>

            <!--Hospital Save Button --> 
            <div class="form-group">                                                              
                <div class="col-md-offset-4 col-md-8">
                    <button id="btn-save" type="submit" class="btn btn-success"><i class="glyphicon glyphicon-ok"></i> &nbsp Save</button>
                    <span style="margin-left:8px;"></span>
                    <a id="btn-cancel" href="<?php echo site_url('admin/hospital');?>" class="btn btn-info"><i class="glyphicon glyphicon-remove"></i>&nbsp Cancel</a>
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
    
    
    
    
