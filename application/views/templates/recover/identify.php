<div class="container">
  <!--identify box starts-->
  <div id="identify-box"  class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
     <div class="panel panel-info" >
        <div class="panel-heading">
            <div class="panel-title">Find Your Account</div>            
        </div>     

        <div style="" class="panel-body" >

            <!--validation error start-->
            <div id="identify-alert" style="<?php if(empty(validation_errors())){echo 'display:none';} ?>" class="alert alert-danger">
                <p>Error:</p>
                <span><?php echo validation_errors();?></span>
            </div> 

            <form id="identify-form" class="form-horizontal" role="form" action="<?php echo site_url('recover/identify');?>" method="post">
                <!--telephone-->
                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                    <input type="tel" class="form-control" id="telephone" name="telephone" placeholder="Enter your telephone" required pattern="^[0][1](1|5|6|7|8|9)\d{8}$" title="i.e. 01922503521">                                        
                </div>                
             
                
                <!--submit button-->
                <div style="margin-top:10px" class="form-group">            
                    <div class="col-sm-12 controls">
                        <button type="submit" id="btn-submit" class="btn btn-success" >search</button>
                        <a id="btn-cancel" href="<?php echo site_url('member/login');?>" class="btn btn-info">cancel</a>
                    </div>
                </div> 
                
                  
            </form>     
        </div>                     
    </div>  
    </div> <!--./login box end-->
</div>
