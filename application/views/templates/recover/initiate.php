<div class="container">
  <!--initiate box starts-->
  <div id="initiate-box"  class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
     <div class="panel panel-info" >
        <div class="panel-heading">
            <div class="panel-title">Reset Your Password</div>            
        </div>     

        <div style="" class="panel-body" >

            <!--validation error start-->
            <div id="initiate-alert" style="<?php if(empty(validation_errors())){echo 'display:none';} ?>" class="alert alert-danger">
                <p>Error:</p>
                <span><?php echo validation_errors();?></span>
            </div> 
            <div class="alert alert-success">
                <?php if(isset($telephone)):?>
                    <p>A varification KEY will be sent to your mobile number : 
                        <strong><?php echo $telephone;?></strong>
                    </p>
                 <?php endif; ?>
            </div> 
            
           <form id="initiate-form" class="form-horizontal" role="form" action="<?php echo site_url('recover/initiate');?>" method="post">                  
                
               <input type="text" name="telephone" style="display:none;" value="<?php if(isset($telephone)){ echo base64_encode($telephone);}?>" >  
            <!--continue button-->
            <div style="margin-top:10px" class="form-group">            
                <div class="col-sm-12 controls">
                    <button type="submit" id="btn-continue" class="btn btn-success">continue</button>
                    <a id="btn-cancel" href="<?php echo site_url('member/login');?>" class="btn btn-info">cancel</a>
                </div>
            </div> 
           </form>     
                
        </div>                     
    </div>  
    </div> <!--./login box end-->
</div>
