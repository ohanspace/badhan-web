<div class="container">
  <!--Complete Registration box starts-->
  <div id="complete_registration_box"  class="mainbox col-md-5 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
     <div class="panel panel-info" >
        <div class="panel-heading">
            <div class="panel-title">Complete Your Registration Process</div>
            <div style="float:right; font-size: 85%; position: relative; top:-10px">
                <a href="#">resend code?</a>
            </div>
        </div>     

        <div style="" class="panel-body" >
            <!--validation error start-->
            <div id="login-alert" style="<?php if(empty(validation_errors())){echo 'display:none';} ?>" class="alert alert-danger">
                <p>Error:</p>
                <span><?php echo validation_errors();?></span>
            </div>
            <!--alert-->
            <div style="" id="complete_registration_alert" class="alert alert-danger col-sm-12">Enter the KEY that has been sent to your phone</div>
            <!--Complete registration form-->
            <form id="complete_registration_form" class="form-horizontal" role="form" action="<?php echo site_url('member/complete_registration');?>" method="post">

                <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
                            <input id="key" type="text" class="form-control" name="key" value="" placeholder="Enter the key">                                        
                </div>           
                
                <!--submit button-->
                <div style="margin-top:10px" class="form-group">            
                    <div class="col-sm-12 controls">
                        <button type="submit" id="btn-submit" class="btn btn-success">Submit</button>

                    </div>
                </div>                 
            </form>     
        </div>                     
    </div>  
    </div> <!--./complete registration box end-->
</div>
