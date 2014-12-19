<h3><?php echo empty($district->district_id) ? 'Add a new district' : 'Edit district ' . $district->name; ?></h3>

<?php echo validation_errors(); ?>
<?php echo form_open(); ?>
<table class="table">
	<tr>
		<td>Name</td>
		<td><?php echo form_input('name', set_value('name', $district->name)); ?></td>
	</tr>
        <tr>
		<td>Name In Bangla</td>
		<td><?php echo form_input('name_in_bangla', set_value('name_in_bangla', $district->name_in_bangla)); ?></td>
	</tr>
	<tr>
		<td>Division</td>
                <td><?php 
                    $options = array(
                        'DHAKA' => 'DHAKA',
                        'CHITTAGONG' => 'CHITTAGONG',
                        'SYLHET' => 'SYLHET',
                        'BARISAL' => 'BARISAL',
                        'KHULNA' => 'KHULNA',
                        'RANGPUR' => 'RANGPUR',
                        'RAJSHAHI' => 'RAJSHAHI'
                    );
                    echo form_dropdown('division_name',$options, $district->division_name); 
                ?></td>
	</tr>
	<tr>
		<td>Geolocation</td>
                <td>
                    <input type="text" name="geolocation[latitude]" id="latitude" readonly="readonly" value="<?php echo set_value('geolocation[latitude]',$geolocation->latitude); ?>" />
                    <input type="text" name="geolocation[longitude]" id="longitude" readonly="readonly" value="<?php echo set_value('geolocation[longitude]',$geolocation->longitude); ?>" />
                </td>
	</tr>
        
	<tr>
		<td></td>
		<td><?php echo form_submit('submit', 'Save', 'class="btn btn-primary"'); ?></td>
	</tr>
</table>
<?php echo form_close();?>
    
<!--map start-->
    <input id="pac-input" class="controls" type="text"
        placeholder="Enter a location">
    <div id="map-canvas" style="height: 400px; width: 700px;">
    </div>
<!--map closed-->
    
    

    
    
