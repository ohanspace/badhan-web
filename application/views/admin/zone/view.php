<section>
	<h2><?php echo $zone->name; ?></h2>
	
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
<?php if(count($units)): foreach($units as $unit): ?>	
		<tr>
			<td><?php echo anchor('admin/unit/view/' . $unit->unit_id, $unit->name); ?></td>
                        <td><?php echo anchor('admin/unit/view/' . $unit->unit_id, $unit->short_name); ?></td>
                        
			<td><?php echo btn_edit('admin/unit/edit/' . $unit->unit_id); ?></td>
			<td><?php echo btn_delete('admin/unit/delete/' . $unit->unit_id); ?></td>
		</tr>
<?php endforeach; ?>

<?php if(count($familys)): foreach($familys as $family): ?>	
		<tr>
			<td><?php echo anchor('admin/family/view/' . $family->family_id, $family->name); ?></td>
                        <td><?php echo anchor('admin/family/view/' . $family->family_id, $family->short_name); ?></td>
                        
			<td><?php echo btn_edit('admin/family/edit/' . $family->family_id); ?></td>
			<td><?php echo btn_delete('admin/family/delete/' . $family->family_id); ?></td>
		</tr>
<?php endforeach;endif;?>
<?php else: ?>
		<tr>
			<td colspan="3">We could not find any unit.</td>
		</tr>
<?php endif; ?>	
		</tbody>
	</table>
</section>