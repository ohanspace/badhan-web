<!-- FOOTER -->
      

<!-- footerTopSection -->
<div class="footerTopSection">
    <div class="container">
        <div class="row">
          
          <div class="col-md-8">
                <h3 style="color: #279B8A">Contact us</h3>
                <p style="color: #661F19">
                        <?php echo $badhan_config['central_office_address']?><br>
                        <?php echo $badhan_config['telephone'].', '.$badhan_config['telephone2']?><br>
                        <a href="mailto:<?php echo $badhan_config['central_email']?>" target="_top"><?php echo $badhan_config['central_email']?></a><br>
                        
                </p>
                
          </div>
            <div class="col-md-4">
                <h3>Stay Connected</h3>                
                <a href="<?php echo $badhan_config['fb_page_url']?>"><img src="<?php echo site_url('assets/custom/img/fb_button.jpg');?>" /></a>
            </div>
        </div>
    </div>
</div>
    <!-- footerBottomSection -->	
<div class="footerBottomSection">
        <div class="container">
            <?php echo $badhan_config['copyright']; ?>
            | 
            <?php echo config_item('site_version') ?>

            <div class="pull-right">
                <a href="<?php echo site_url('index.php')?>"><img src="<?php echo site_url($badhan_config['bangla_text_uri'])?>" alt="BADHAN" /></a>
            </div>
        </div>
</div>    




<script src="<?php echo site_url('assets/bootstrap/js/bootstrap.min.js');?>"></script>
<script src="<?php echo site_url('assets/businessPlate/js/modernizr.custom.js');?>"></script>			          
<script src="<?php echo site_url('assets/businessPlate/js/modernizr.js');?>"></script>
<script src="<?php echo site_url('assets/businessPlate/js/jquery.cslider.js');?>"></script>
<script src="<?php echo site_url('assets/businessPlate/js/jquery.sticky.js');?>"></script>
<script src="<?php echo site_url('assets/custom/js/bootstrap-select.min.js');?>"></script>
<script src="<?php echo site_url('assets/custom/js/jquery.datetimepicker.min.js');?>"></script>         
<script src="<?php echo site_url('assets/businessPlate/js/app.js');?>"></script>
<script src="<?php echo site_url('assets/businessPlate/js/index.js');?>"></script>
<script src="<?php echo site_url('assets/custom/js/publicFunctions.js');?>"></script>
<!--load google map api-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmfZ8LXdHc-voorsUwItQw7ZL2xMeLkkc&sensor=false&libraries=places" ></script> 

<script type="text/javascript">
    $(document).ready(function() {
       
      	App.init();
        Index.initParallaxSlider();
       
        //input type select field picker
         $('.selectpicker').selectpicker();
         
         
        //datepicker
        $('.datepicker').datetimepicker({ 
            format : 'Y-m-d',
            maxDate: 0,
            timepicker : false,
            closeOnDateSelect : true,
            validateOnBlur : false,
            yearStart : 1997,
            scrollInput : false,
            
        });
               
                      

        
    });
    
    
</script>

</body>
</html>