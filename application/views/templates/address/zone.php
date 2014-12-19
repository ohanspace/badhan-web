<div class="container" style="margin-top: 50px">
    <div class="row">
    <div class="col-md-8">
            <!--map start-->           
            <div id="googleMap" style="height: 350px; width: 100%;">
            </div>
            <!--map closed-->
    </div>
    	
    <div class="col-md-4">
        <h2 style="color:#009933"><?php echo $zone_info->name_in_bangla ?></h2>
        <strong style="color:#000013">Established at  <?php echo $zone_info->estd ?></h2> </strong>
        <div>
                       
        </div>
        <div>
            <address>
                <strong style="color: #562200"><?php echo $zone_info->address ?></strong><br>
                <strong>Office Time  : </strong><?php echo $zone_info->office_open_time ?> - <?php echo $zone_info->office_close_time ?> <br>
               
                <span><?php echo $zone_info->telephone ?></span>
                <span><?php echo $zone_info->telephone2 ?></span>
                <span><?php echo $zone_info->telephone3 ?></span><br>
                
                    <b>Email: </b><a href="<?php echo 'mailto:'.$zone_info->email;?>"><?php echo $zone_info->email ?></a>
                
            
            </address>
        </div>
        
    </div>
    </div>
    <div class="container col-md-offset-2 col-md-6" style="margin-bottom: 100px ">
        <h3>Available Units :</h3>
        <div class="panel-group" id="accordion">  
           <?php foreach ($unit_info as $unit):?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="<?php echo '#'.$unit->unit_id;?>">
                      <?php echo $unit->unit_name; ?>
                    </a>
                    </h4>
                </div>
                <div id="<?php echo $unit->unit_id; ?>" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p><a class="btn btn-info" href="<?php echo site_url('address/'.$unit->unit_id);?>">view</a> the unit</p>
                        
   			<?php echo $unit->address ?><br>  
                        <strong>Office Time  : </strong><?php echo $unit->office_open_time ?> - <?php echo $unit->office_close_time ?> <br>
                        <span><?php echo $unit->telephone ?></span>
                        <span><?php echo $unit->telephone2 ?></span>
                        <span><?php echo $unit->telephone3 ?></span><br>
                        <b>Email: </b><a href="<?php echo 'mailto:'.$unit->email;?>"><?php echo $unit->email ?></a>
                    </div>
                </div>
            </div>


           <?php endforeach;?>  
        </div>
    </div>
</div>