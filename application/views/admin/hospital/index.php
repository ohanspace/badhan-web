<section>
    <h2>Hospitals<small> Total: <?php echo count($hospitals);?></small></h2>        
	<?php echo anchor('admin/hospital/edit', '<i class="glyphicon glyphicon-plus"></i> Add a Hospital'); ?>
	<?php if($pagination): ?>
            <section ><?php echo $pagination; ?></section>
        <?php endif; ?>
	<table class="table table-striped">
		<thead>
			<tr>                                
				<th>Name</th>                              
                                <th>Short Name</th>
                                <th>Type</th>                                         
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
<?php if(count($hospitals)): foreach($hospitals as $hospital): ?>	
		<tr>
                        
			<td><?php echo anchor('admin/hospital/edit/' . $hospital->hospital_id, $hospital->name_in_bangla); ?></td>
                        <td><?php echo anchor('admin/hospital/edit/' . $hospital->hospital_id, $hospital->short_name); ?></td>
                        <td><?php echo $hospital->type; ?></td>                                    
			<td><?php echo btn_edit('admin/hospital/edit/' . $hospital->hospital_id); ?></td>
			<td><?php echo btn_delete('admin/hospital/delete/' . $hospital->hospital_id); ?></td>
		</tr>
<?php endforeach; ?>
<?php else: ?>
		<tr>
			<td colspan="3">We could not find any hospitals.</td>
		</tr>
<?php endif; ?>	
		</tbody>
	</table>
</section>