<h3>Select Organogram:</h3>

<div id="menuwrapper" style="margin-top: 50px">
            <ul>
            <li><a href='<?php echo $moderator_view_link.'/central'?>'>Central</a>
            <?php foreach ($organogram['zones'] as $zone => $units):?>
            <li><a href="<?php echo $moderator_view_link.'/'.$zone;?>"><?php echo $zone?></a>
                    <ul>
                    <?php if(count($units)): foreach ($units as $unit):?>
                        <li><a href="<?php echo $moderator_view_link.'/'.$zone.'/'.$unit->organogram_name;?>"><?php echo $unit->organogram_name;?></a></li>
                    <?php endforeach;endif;?>
                    </ul>
                </li>
             <?php endforeach;?>
             
             
             <?php if(count($organogram['individual_units'])): ?>
             <li><?php echo 'Individual Units'?>
              <ul>
             	<?php foreach ($organogram['individual_units'] as $unit):?>                                             
                        <li><a href="<?php echo $moderator_view_link.'/'.$unit->organogram_name;?>"><?php echo $unit->organogram_name;?></a></li>
                <?php endforeach;?>
               </ul>
              </li>
             <?php endif;?>
             
             
             <?php if(count($organogram['familys'])): ?>
             <li><?php echo 'Familys'?>
              <ul>
             	<?php foreach ($organogram['familys'] as $family):?>                                             
                        <li><a href="<?php echo $moderator_view_link.'/'.$family->organogram_name;?>"><?php echo $family->organogram_name;?></a></li>
                <?php endforeach;?>
               </ul>
              </li>
             <?php endif;?>
            
                           
                
            </ul>    
        </div>