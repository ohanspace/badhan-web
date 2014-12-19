<section>
    <h2>Institutions<small> Total: <?php echo count($institutions);?></small></h2>        
	<?php echo anchor('admin/institution/edit', '<i class="glyphicon glyphicon-plus"></i> Add a Institution'); ?>
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
<?php if(count($institutions)): foreach($institutions as $institution): ?>	
		<tr>
                        
			<td><?php echo anchor('admin/institution/edit/' . $institution->institution_id, $institution->name_in_bangla); ?></td>
                        <td><?php echo anchor('admin/institution/edit/' . $institution->institution_id, $institution->short_name); ?></td>
                        <td><?php echo $institution->type; ?></td>                                    
			<td><?php echo btn_edit('admin/institution/edit/' . $institution->institution_id); ?></td>
			<td><?php echo btn_delete('admin/institution/delete/' . $institution->institution_id); ?></td>
		</tr>
<?php endforeach; ?>
<?php else: ?>
		<tr>
			<td colspan="3">We could not find any institutions.</td>
		</tr>
<?php endif; ?>	
		</tbody>
	</table>
</section>