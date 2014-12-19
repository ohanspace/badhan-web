<section>
    <h2>Familys: <small>total <?php echo count($familys);?></small></h2>
	<?php echo anchor('admin/family/edit', '<i class="glyphicon glyphicon-plus"></i> Add a Family'); ?>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Name</th> 
                                <th>Name in Bangla</th>
                                <th>Short Name</th>                                                        
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
<?php if(count($familys)): foreach($familys as $family): ?>	
		<tr>
			<td><?php echo anchor('admin/family/view/' . $family->family_id, $family->name); ?></td>
                        <td><?php echo anchor('admin/family/view/' . $family->family_id, $family->name_in_bangla); ?></td>
                        <td><?php echo $family->short_name; ?></td>                                          
			<td><?php echo btn_edit('admin/family/edit/' . $family->family_id); ?></td>
			<td><?php echo btn_delete('admin/family/delete/' . $family->family_id); ?></td>
		</tr>
<?php endforeach; ?>
<?php else: ?>
		<tr>
			<td colspan="3">We could not find any family.</td>
		</tr>
<?php endif; ?>	
		</tbody>
	</table>
</section>