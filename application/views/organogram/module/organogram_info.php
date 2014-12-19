<div class="panel panel-info col-md-6 ">
  <!-- Default panel contents -->
  <div class="panel-heading">
  
  	<span>
  	<?php echo $organogram->name?>
  	<?php if($organogram->institution_id):?>
    	| <?php echo $institution->name_in_bangla?>
    <?php endif;?>
    </span>
    <?php if($organogram->geolocation_id): $geolocation = $this->geolocation_m->get($organogram->geolocation_id)?>
    		<a href="#"  id='viewOnMap' data-toggle="modal" data-target="#myModalMap">
				<span class="label label-success pull-right">view on Map </span>
			</a>
    		
			
			
			
			
	<?php endif;?>	  
  </div>
  
  
  <div class="panel-body"> 	
    <p><?php echo about_organogram($organogram->organogram_type, $organogram->about)?></p>  
  </div>

  <!-- List group -->
  <ul class="list-group">
  
	<!--   Establishment -->
  <?php if($organogram->estd):?>
    <li class="list-group-item">
	    <span class="glyphicon glyphicon-calendar"></span> Establishment : 
	    <?php echo $organogram->estd?>
    </li>
   <?php endif;?> 
   
	<!--    Telephone -->
   <?php if($organogram->telephone || $organogram->telephone2 || $organogram->telephone3 ):?>
    <li class="list-group-item">
    	<span class="glyphicon glyphicon-phone"></span> Telephone : 
    	<?php echo $organogram->telephone?>
    	<?php echo $organogram->telephone2?> 
    	<?php echo $organogram->telephone3?>
    </li>
   <?php endif;?>
   
   <!--   office time -->
  <?php if($organogram->office_open_time && $organogram->office_close_time):?>
    <li class="list-group-item">
	    <span class="glyphicon glyphicon-time"></span> Office Time : 
	    <?php echo $organogram->office_open_time?> - <?php echo $organogram->office_close_time?>
    </li>
   <?php endif;?> 
   
   
    <!--   Email -->
  <?php if($organogram->email):?>
    <li class="list-group-item">
	    <span class="glyphicon glyphicon-envelope"></span> Email : 
	    <a href="mailto:<?php echo $organogram->email?>"><?php echo $organogram->email?></a>
    </li>
   <?php endif;?> 
   
    <!--   Facebook Group -->
  <?php if($organogram->fb_group_link):?>
    <li class="list-group-item">
	    <span class="glyphicon glyphicon-th"></span> Facebook Group : 
	    <a href="<?php echo addhttp($organogram->fb_group_link)?>" target='_blank'><?php echo $organogram->fb_group_link?></a>
    </li>
   <?php endif;?>
   
    <!--   Address -->
  <?php if($organogram->address):?>
    <li class="list-group-item">
	    <span class="glyphicon glyphicon-home"></span> Address : 
	    <address><?php echo $organogram->address?></address>
    </li>
   <?php endif;?> 
   
  </ul>
</div>


<?php $this->load->view('organogram/module/myModalMap')?>
    		
    		<script>
				
	    		var lat,lng,zoom;
				lat = <?php echo $geolocation->latitude?>;
				lng = <?php echo $geolocation->longitude?>;
				zoom = <?php echo $geolocation->zoom?>;
    		
    			$(document).ready(function(){
    				
					$("#viewOnMap").click(function(){
						var modalTitle = $(this).prev();
						$("#myModalLabel").text(modalTitle.text());
	    				
						viewOnMap(lat,lng,zoom);
					});
        		});
        			
				
				
			</script>