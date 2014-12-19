<div class="panel panel-success col-md-5 col-md-offset-1">
  <!-- Default panel contents -->
  <div class="panel-heading"><?php echo  $parent->name?></div>
  <div class="panel-body">
    <p><?php echo about_organogram($parent->organogram_type, $parent->about)?></p>
  </div>

 <!-- List group -->
  <ul class="list-group">
  
	<!--   Establishment -->
  <?php if($parent->estd):?>
    <li class="list-group-item">
	    <span class="glyphicon glyphicon-calendar"></span> Establishment : 
	    <?php echo $parent->estd?>
    </li>
   <?php endif;?> 
   
	<!--    Telephone -->
   <?php if($parent->telephone || $parent->telephone2 || $parent->telephone3 ):?>
    <li class="list-group-item">
    	<span class="glyphicon glyphicon-phone"></span> Telephone : 
    	<?php echo $parent->telephone?>
    	<?php echo $parent->telephone2?> 
    	<?php echo $parent->telephone3?>
    </li>
   <?php endif;?>
   
   <!--   office time -->
  <?php if($parent->office_open_time && $parent->office_close_time):?>
    <li class="list-group-item">
	    <span class="glyphicon glyphicon-time"></span> Office Time : 
	    <?php echo $parent->office_open_time?> - <?php echo $parent->office_close_time?>
    </li>
   <?php endif;?> 
   
   
    <!--   Email -->
  <?php if($parent->email):?>
    <li class="list-group-item">
	    <span class="glyphicon glyphicon-envelope"></span> Email : 
	    <a href="mailto:<?php echo $parent->email?>"><?php echo $parent->email?></a>
    </li>
   <?php endif;?> 
   
    <!--   Facebook Group -->
  <?php if($parent->fb_group_link):?>
    <li class="list-group-item">
	    <span class="glyphicon glyphicon-th"></span> Facebook Group : 
	    <a href="<?php echo addhttp($parent->fb_group_link)?>" target='_blank'><?php echo $parent->fb_group_link?></a>
    </li>
   <?php endif;?>
   
    <!--   Address -->
  <?php if($parent->address):?>
    <li class="list-group-item">
	    <span class="glyphicon glyphicon-home"></span> Address : 
	    <address><?php echo $parent->address?></address>
    </li>
   <?php endif;?> 
   
  </ul>
</div>