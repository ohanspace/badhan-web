<section>
	<h2>Zones <small>total <?php echo count($zones);?></small></h2>
	<?php echo anchor('admin/zone/edit', '<i class="glyphicon glyphicon-plus"></i> Add a Zone'); ?>
	<table class="table table-striped">
		<thead>
			<tr>				
                                <th>Name</th>
                                <th>Short Name</th>                                
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
<?php if(count($zones)): foreach($zones as $zone): ?>	
		<tr>                        
			<td><?php echo anchor('admin/zone/view/' . $zone->zone_id, $zone->name); ?></td>
                        <td><?php echo anchor('admin/zone/view/' . $zone->zone_id, $zone->short_name); ?></td>
                        
			<td><?php echo btn_edit('admin/zone/edit/' . $zone->zone_id); ?></td>
			<td><?php echo btn_delete('admin/zone/delete/' . $zone->zone_id); ?></td>
		</tr>
<?php endforeach; ?>
<?php else: ?>
		<tr>
			<td colspan="3">We could not find any zone.</td>
		</tr>
<?php endif; ?>	
		</tbody>
	</table>
</section>