<div class="modal-header">
    <h3>
        <?php if(count($member))  echo 'Edit: ' . $member->name.' Unit'; 
              
              else {
                    echo 'No such member exist'; 
                    exit();
                    
                }
        ?>
    </h3>
</div>
<div class="modal-body">
<?php echo validation_errors(); ?>
<?php echo form_open(); ?>
<table class="table">
	<tr>
		<td>Name</td>
		<td><?php echo form_input('name', set_value('name', $member->name)); ?></td>
	</tr>
	<tr>
		<td>Phone</td>
		<td><?php echo form_input('phone', set_value('phone', $member->phone)); ?></td>
	</tr>
        <tr>
		<td>Unit ID</td>
		<td><?php echo form_input('unit_id', set_value('unit_id', $member->unit_id)); ?></td>
	</tr>
        <tr>
		<td>Blood Group</td>
		<td><?php echo form_input('blood_group', set_value('blood_group', $member->blood_group)); ?></td>
	</tr>
	
	<tr>
		<td></td>
		<td><?php echo form_submit('submit', 'Save', 'class="btn btn-primary"'); ?></td>
	</tr>
</table>
<?php echo form_close();?>
</div>