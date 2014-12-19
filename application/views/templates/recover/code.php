<div class="container">
  <!--identify box starts-->
  <div id="code-box"  class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
     <div class="panel panel-info" >
        <div class="panel-heading">
            <div class="panel-title">Check Your Mobile Phone</div>            
        </div>     

        <div style="" class="panel-body" >

            <!--validation error start-->
            <div id="code-alert" style="<?php if(empty(validation_errors())){echo 'display:none';} ?>" class="alert alert-danger">
                <p>Error:</p>
                <span><?php echo validation_errors();?></span>
            </div> 
            <!--info-->
            <div class="alert alert-success">
                    <p>A varification KEY has been sent to your mobile number : 
                        <strong><?php echo $telephone;?></strong>
                    </p>
            </div>

            <form id="code-form" class="form-horizontal" role="form" action="<?php echo site_url('recover/code');?>" method="post">
                <!--code-->
                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
                    <input type="text" class="form-control" id="key" name="key" placeholder="Enter the KEY" required maxlength="6">                                        
                </div>                
             
                
                <!--submit button-->
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
