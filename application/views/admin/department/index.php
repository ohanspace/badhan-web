<section>
    <h2>Departments</h2>        
	<?php echo anchor('admin/department/edit', '<i class="glyphicon glyphicon-plus"></i> Add a Department'); ?>
	<?php if($pagination): ?>
            <section ><?php echo $pagination; ?></section>
        <?php endif; ?>
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
<?php if(count($departments)): foreach($departments as $department): ?>	
		<tr>
                        
			<td><?php echo anchor('admin/department/edit/' . $department->department_id, $department->name); ?></td>
                        <td><?php echo $department->name_in_bangla; ?></td>
                        <td><?php echo $department->short_name; ?></td>                                        
			<td><?php echo btn_edit('admin/department/edit/' . $department->department_id); ?></td>
			<td><?php echo btn_delete('admin/department/delete/' . $department->department_id); ?></td>
		</tr>
<?php endforeach; ?>
<?php else: ?>
		<tr>
			<td colspan="3">We could not find any departments.</td>
		</tr>
<?php endif; ?>	
		</tbody>
	</table>
</section>