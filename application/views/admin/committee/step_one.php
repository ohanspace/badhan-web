
<h2>Select Committee Type & Sessions</h2>
<?php echo validation_errors(); ?>
<?php echo form_open(); ?>
<table class="table">
	<tr>
		<td>Committee type</td>
		<td>
                    <?php 
                        $options = array(
                          'unit' => 'Unit Committee',
                          'zone' => 'Zone Committee',
                          'central' => 'Central Committee',
                        );
                        echo form_dropdown('type',$options,'unit'); 
                    ?>
                </td>
        </tr>
        <tr>
                <td>Committee Begin Date</td>
                <td><?php echo form_input('begin_date');?></td>
        </tr>
        <tr>
                <td>Committee End Date</td>
                <td><?php echo form_input('end_date');?></td>
        </tr>
	
	<tr>
		<td></td>
		<td><?php echo form_submit('submit', 'next >>', 'class="btn btn-primary"'); ?></td>
	</tr>
</table>
<?php echo form_close();?>