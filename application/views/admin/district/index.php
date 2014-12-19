<section>
    <h2>Districts <span class="badge"> Total : <?php echo $count;?></span></h2>
	<?php if($pagination): ?>
        <section ><?php echo $pagination; ?></section>
        <?php endif; ?>
	<table class="table table-striped">
		<thead>
			<tr>
                                <th>Id</th>
				<th>Name</th>
                                <th>Name In Bangla</th>
                                <th>Division</th>                              
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
<?php if(count($districts)): foreach($districts as $district): ?>	
		<tr>
                        <td><?php echo anchor('admin/district/edit/' . $district->district_id, $district->district_id); ?></td>
			<td><?php echo anchor('admin/district/edit/' . $district->district_id, $district->name); ?></td>
                        <td><?php echo $district->name_in_bangla; ?></td>
                        <td><?php echo $district->division_name; ?></td>                       
			<td><?php echo btn_edit('admin/district/edit/' . $district->district_id); ?></td>
			<td><?php echo btn_delete('admin/district/delete/' . $district->district_id); ?></td>
		</tr>
<?php endforeach; ?>
<?php else: ?>
		<tr>
			<td colspan="3">We could not find any districts.</td>
		</tr>
<?php endif; ?>	
		</tbody>
	</table>
</section>