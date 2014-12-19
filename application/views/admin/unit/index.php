<section>
    <h2>Units: <span class="badge"> Total : <?php echo $count;?></span></h2>
	<?php echo anchor('admin/unit/edit', '<i class="glyphicon glyphicon-plus"></i> Add a Unit'); ?>
        <?php if($pagination): ?>
        <section ><?php echo $pagination; ?></section>
        <?php endif; ?>
	<table class="table table-striped">
		<thead>
			<tr>
                                <th>ID</th>
				<th>Name</th>                               
                                <th>Short Name</th>
                                <th>zone id</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
<?php if(count($units)): foreach($units as $unit): ?>	
		<tr>
                        <td><?php echo $unit->unit_id;?></td>
			<td><?php echo anchor('admin/unit/view/' . $unit->unit_id, $unit->name); ?></td>       
                        <td><?php echo $unit->short_name; ?></td>                        
                        <td><?php echo !$unit->zone_id?'Individual':$unit->zone_id;?></td>
                        <td><?php echo btn_edit('admin/unit/edit/' . $unit->unit_id); ?></td>
			<td><?php echo btn_delete('admin/unit/delete/' . $unit->unit_id); ?></td>
		</tr>
<?php endforeach; ?>
<?php else: ?>
		<tr>
			<td colspan="3">We could not find any unit.</td>
		</tr>
<?php endif; ?>	
		</tbody>
	</table>
</section>