<?php if(!empty($zone)) :?>
<h2><?php echo $zone->name?> Committee</h2>
<?php if(!empty($committee_years)):?>
<h3>Committee Lists(database):</h3>
<?php foreach ($committee_years as $committee_year):?>
<li><a href='<?php echo site_url('admin/zone_committee/view/'.strtolower($zone->short_name).'/'.$committee_year)?>'><?php echo $committee_year?></a></li>
<?php endforeach;?>
<?php endif;?>
<!-- add new committee-->
<h4>Add new committee</h4>
<?php echo form_open()?>
Year: 
<?php echo form_input('new_committee_year')?>
<?php echo form_submit('submit','Submit','class = "btn btn-primary"')?>
<?php echo form_close()?>



<?php else :?>
<h3> Zone Lists</h3>
<?php foreach ($zones as $short_name => $name):?>
<ul>
  <li><a href='<?php echo site_url('admin/zone_committee/index/'.$short_name)?>'><?php echo $name?></a></li>
  
</ul>
<?php endforeach;?>
<?php endif;?>