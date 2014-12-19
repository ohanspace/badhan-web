<div class="panel panel-primary">
  <div class="panel-heading">
      <?php echo empty($department->department_id) ? 'Add a new department' : 'Edit department: ' .'<strong>'. $department->name.'</strong>'; ?>
      <!--anchor to all department-->
      <a type="button" class="btn btn-default btn-sm pull-right" href="<?php echo site_url('admin/department');?>">
        <span class="glyphicon glyphicon-list-alt"></span> All
      </a>
      
  </div>
 
  <form class="form-horizontal" role="form" method="post"  >
    <div class="panel-body">
          <!--validation error-->
          <div  style="<?php if(empty(validation_errors())){echo 'display:none';} ?>" class="alert alert-danger">
              <p>Error:</p>
              <span><?php echo validation_errors();?></span>
          </div> 
          
          <!--Name-->
          <div class="form-group">
              <label for="name" class="col-md-4 control-label">Name</label>
              <div class="col-md-8">
                  <input type="text" class="form-control" id="name" name="name" value="<?php echo set_value('name', $department->name);?>" placeholder="Unit Name" required maxlength="100">
              </div>
          </div>
          <!--Name In Bangla-->
          <div class="form-group">
              <label for="name_in_bangla" class="col-md-4 control-label">Name In Bangla</label>
              <div class="col-md-8">
                  <input type="text" class="form-control" id="name_in_bangla" name="name_in_bangla" value="<?php echo set_value('name_in_bangla', $department->name_in_bangla);?>" placeholder="Name In Bangla"  maxlength="100">
              </div>
          </div>
          <!--Short Name-->
          <div class="form-group">
              <label for="short_name" class="col-md-4 control-label">Short Name</label>
              <div class="col-md-8">
                  <input type="text" class="form-control" id="short_name" name="short_name" value="<?php echo set_value('short_name', $department->short_name);?>" placeholder="Short Name" required maxlength="30">
              </div>
          </div>
    </div>
    <div class="panel-footer">
         <!--Save Button --> 
                  <div class="form-group">                                                              
                      <div class="col-md-offset-4 col-md-8">
                          <button id="btn-save" type="submit" class="btn btn-success"><i class="glyphicon glyphicon-ok"></i> &nbsp Save</button>
                          <span style="margin-left:8px;"></span>
                          <a class="btn btn-info" href="<?php echo site_url('admin/department');?>" ><i class="glyphicon glyphicon-remove"></i>&nbsp Cancel</a>
                      </div>
                  </div>  
    </div>
  </form>

</div>


    
    

    
    
    
