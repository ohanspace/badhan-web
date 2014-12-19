<h3>Add New Unit</h3>
<?php echo '<pre>'; print_r($type) ; echo '</pre>'; ?>
<?php echo validation_errors(); ?>
<?php echo form_open(); ?>
<table class="table">
	<tr>
		<td>Name</td>
		<td><?php echo form_input('name'); ?></td>
	</tr>
	<tr>
		<td>Short Name</td>
		<td><?php echo form_input('short_name'); ?></td>
	</tr>
	<tr>
		<td>Zone Id</td>
		<td><?php echo form_input('zone_id'); ?></td>
	</tr>
	<tr>
		<td></td>
		<td><?php echo form_submit('submit', 'Add', 'class="btn btn-primary"'); ?></td>
	</tr>
</table>
<?php echo form_close();?>