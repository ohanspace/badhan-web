<div class="container">
  <!--Recover password box starts-->
  <div id="recover_password_box"  class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
     <div class="panel panel-info" >
        <div class="panel-heading">
            <div class="panel-title">Recover Your Password</div>            
        </div>     

        <div style="" class="panel-body" >

            <div style="display:none;" id="recover_password_alert" class="alert alert-danger col-sm-12">alert</div>

            <form id="recover_password_form" class="form-horizontal" role="form" action="<?php echo site_url('member/recover_password');?>">
                <!--telephone-->
                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                    <input id="telephone" type="text" class="form-control" name="telephone" value="" placeholder="Your telephone">                                        
                </div>
                <!--new password-->
                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input id="password" type="password" class="form-control" name="password" placeholder="New password">
                </div>
             
                
                <!--submit button-->
                <div style="margin-top:10px" class="form-group">            
                    <div class="col-sm-12 controls">
                        <button type="submit" id="btn-login" class="btn btn-success">Submit</button>

                    </div>
                </div> 
                  
            </form>     
        </div>                     
    </div>  
    </div> <!--./login box end-->
</div>
