
<h2>Select <?php echo ucfirst($type); ?></h2>
<?php echo validation_errors(); ?>
<?php $hidden = array('type', 'begin_date', 'end_date'); ?>
<?php echo form_open('admin/committee/step_two','',$hidden); ?>
<table class="table">
	<tr>
            <td>Select <?php echo ucfirst($type); ?> </td>
		<td>
                    <?php 
                        
                        echo form_dropdown('id',$options); 
                    ?>
                </td>
        
        </tr>
       
           <?php echo form_input('type',$type,'class="hidden"');?>
           <?php echo form_input('begin_date',$begin_date,'class="hidden"');?>
           <?php echo form_input('end_date',$end_date,'class="hidden"');?>
        
	
	<tr>
		<td></td>
		<td><?php echo form_submit('submit', 'next >>', 'class="btn btn-primary"'); ?></td>
	</tr>
</table>
<?php echo form_close();?>