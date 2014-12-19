<div class="container">
  <!--Login box starts-->
  <div id="loginbox"  class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
     <div class="panel panel-info" >
        <div class="panel-heading">
            <div class="panel-title">Sign In</div>
            <div class="forgot-psw"><a href="<?php echo site_url('recover/identify');?>">Forgot password?</a></div>
        </div>     

        <div style="" class="panel-body" >

             <!--validation error start-->
            <div id="login-alert" style="<?php if(empty(validation_errors())){echo 'display:none';} ?>" class="alert alert-danger">
                <p>Error:</p>
                <span><?php echo validation_errors();?></span>
            </div>
             <?php if(!empty($this->session->flashdata('login_error'))):?>
             <div id="login-failed-error" class="alert alert-danger">
                <p>Error:</p>
                <span><?php echo $this->session->flashdata('login_error')?></span>
            </div>
             <?php endif; ?>
             
             <?php if(!empty($this->session->flashdata('reg_complete'))):?>
             <div id="login-failed-error" class="alert alert-danger">              
                <span><?php echo $this->session->flashdata('reg_complete')?></span>
            </div>
             <?php endif; ?>

            <form id="login-form" class="form-horizontal" role="form" action="<?php echo site_url('member/login');?>" method="post">
                <!--username-->
                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                    <input id="telephone" type="text" class="form-control" name="telephone" value="<?php echo set_value('telephone');?>" placeholder="phone">                                        
                </div>
                <!--password-->
                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input id="password" type="password" class="form-control" name="password" placeholder="password">
                </div>
                
                 <div style="margin-top:10px" class="form-group">
                        
                     <!-- SUbmit Button -->
                        <div class="col-sm-12 controls">
                          <button type="submit" id="btn-login" name="submit" class="btn btn-success">Login  </button>
                          <a id="btn-fblogin" href="#" class="btn btn-primary">Login with Facebook</a>

                        </div>
                  </div>


                <div class="form-group">
                    <div class="col-md-12 control">
                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                            Don't have an account! 
                            <a href="<?php echo site_url('member/registration');?>" >
                            Sign Up Here
                        </a>
                        </div>
                    </div>
                </div>    
            </form>     
        </div>                     
    </div>  
  </div> <!--./login box end-->
</div>
