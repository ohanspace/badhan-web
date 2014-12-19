<div class="col-md-offset-2 col-md-8">
<h2>Individual Units</h2>

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