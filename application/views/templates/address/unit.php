
<div class="container" style="margin-top: 50px; margin-bottom: 100px">
    <div class="row-fluid">
        <div class="col-md-8">
            <!--map start-->           
            <div id="googleMap" style="height: 300px; width: 100%;">
            </div>
            <!--map closed-->
    	</div>
    	
      	<div class="col-md-4">
    		<h2 style="color: #6CBB3E"><?php echo $unit_info->unit_name_in_bangla ?></h2>
                <strong style="color:#000013">Established at  <?php echo $unit_info->estd ?></h2> </strong>
                <div>    			
                        <strong style="color: #0044cc"><?php echo $unit_info->institution_name ?></strong><br>
                        <br><br>
                </div>
    			
                
                    <address>
                        <strong style="color: #34949D"><a href="<?php echo site_url('address/'.$unit_info->zone_short_name);?>"><?php echo $unit_info->zone_short_name ?> </a></strong><br>
   			<?php echo $unit_info->address ?><br>  
                        <strong>Office Time  : </strong><?php echo $unit_info->office_open_time ?> - <?php echo $unit_info->office_close_time ?> <br>
                        <span><?php echo $unit_info->telephone ?></span>
                        <span><?php echo $unit_info->telephone2 ?></span>
                        <span><?php echo $unit_info->telephone3 ?></span><br>
                        <b>Email: </b><a href="<?php echo 'mailto:'.$unit_info->email;?>"><?php echo $unit_info->email ?></a>
    			
    		</address>
    	</div>
    </div>
</div>


