<div class="container">

<div class="well well-lg">
	<?php echo $organogram->name; ?> <br>
	<?php echo $organogram->name_in_bangla?>
	
	

</div>

	<div class='col-md-6'>
	  <!-- existing committees -->
	  <ul>
		<?php foreach ($organogram->existing_committees as $committee):?>
			<li><a href='<?php 
			echo site_url('committee/members/'.$committee->committee_id.'/'.
									$committee->committee_year)?>'>
			<?php echo $committee->committee_title?>
			</a> 
			<?php echo $committee->editable? 'Editable' : 'Fixed'?>
			
			</li>
		<?php endforeach;?>	
		</ul>
	</div>
	
	
	<div class='col-md-6'>
		<!-- add new committee-->
	<h4>Add new committee</h4>
	<?php echo form_open()?>
	Year: 
	<?php echo form_input('new_committee_year')?>
	<?php echo form_submit('submit','Submit','class = "btn btn-primary"')?>
	<?php echo form_close()?>
	</div>
	
</div>
