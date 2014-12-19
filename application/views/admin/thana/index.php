<section>
    <h2>Thanas<small> Total: <?php echo count($thanas);?></small></h2>        
	<?php echo anchor('admin/thana/edit', '<i class="glyphicon glyphicon-plus"></i> Add a Thana'); ?>
	<?php if($pagination): ?>
            <section ><?php echo $pagination; ?></section>
        <?php endif; ?>
	<table class="table table-striped">
		<thead>
			<tr>                                
				<th>Name</th>                              
                                <th>Name in Bangla</th>
                                <th>District ID</th>                                         
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
<?php if(count($thanas)): foreach($thanas as $thana): ?>	
		<tr>
                        
			<td><?php echo anchor('admin/thana/edit/' . $thana->thana_id, $thana->name); ?></td>
                        <td><?php echo anchor('admin/thana/edit/' . $thana->thana_id, $thana->name_in_bangla); ?></td>
                        <td><?php echo anchor('admin/district/edit/' . $thana->district_id, $thana->district_name);?></td>                                    
			<td><?php echo btn_edit('admin/thana/edit/' . $thana->thana_id); ?></td>
			<td><?php echo btn_delete('admin/thana/delete/' . $thana->thana_id); ?></td>
		</tr>
<?php endforeach; ?>
<?php else: ?>
		<tr>
			<td colspan="3">We could not find any thana.</td>
		</tr>
<?php endif; ?>	
		</tbody>
	</table>
</section>