
<h3><?php echo $zone->name?> Committee <?php echo $committee_year?><span class='badge'> Total member : <?php echo count($committee_members)?></span></h3>
<?php if($this->session->flashdata('new_committee_member_id')){
	echo 'New committee member successfully added';
}?>
<!-- committee members -->
<?php if(!empty($committee_members)):?>

<table class="table">
  <tr>
    <th>designation name</th>
    <th>Member Name</th>
    <th>Member Name in bangla</th>
    <th>Blood Group</th>
    <th>telephone</th>
    <th>Unit Name</th>
    <th>Session</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>
  <?php foreach ($committee_members as $committee_member):?>
  <tr>
    <td><?php echo $committee_member->designation_name?></td>
    <td><?php echo $committee_member->name?></td>
    <td><?php echo $committee_member->name_in_bangla?></td>
    <td><?php echo $committee_member->blood_group?></td>
    <td><?php echo $committee_member->telephone?></td>
    <td><?php echo $committee_member->unit_name?></td>
    <td><?php echo $committee_member->session?></td>
    <td><a href="<?php echo site_url('admin/zone_committee/edit/'.$zone_short_name.'/'.$committee_member->id)?>">Edit</a></td>
    <td><a href="<?php echo site_url('admin/zone_committee/delete/'.$committee_member->id)?>">delete</a></td>
  </tr>
  <?php endforeach;?>
</table>

<?php endif;?>

<!-- Add committee member -->
<?php if (isset($committee_year)): ?>
<hr>
<h4>Add new member</h4>
<?php if($this->session->flashdata('new_committee_member_id')){
	echo 'New committee member successfully added';
}?>

<?php echo validation_errors()?>
<?php echo form_open()?>

<table class='table'>
  
  <tr>
    <td>Designation</td>
    <td><?php echo form_dropdown('designation_id',$zone_committee_designations,set_value('designation_id',$new_committee_member->designation_id))?></td>
  </tr>
  <tr>
  	<td>Name</td>
  	<td><?php echo form_input('name',set_value('name',$new_committee_member->name))?></td>
  </tr>
  <tr>
  	<td>Name In Bangla</td>
  	<td><?php echo form_input('name_in_bangla',set_value('name_in_bangla',$new_committee_member->name_in_bangla))?></td>
  </tr>
  <tr>
  	<td>Blood Group</td>
  	<td><?php echo form_dropdown('blood_group',$blood_groups,set_value('blood_group',$new_committee_member->blood_group))?></td>
  </tr>
  <tr>
  	<td>Unit</td>
  	<td><?php echo form_dropdown('unit_id',$units_option,set_value('unit_id',$new_committee_member->unit_id))?></td>
  </tr>
  <tr>
  	<td>Session</td>
  	<td><?php echo form_input('session',set_value('session',$new_committee_member->session))?></td>
  </tr>
  <tr>
  	<td>Telephone</td>
  	<td><?php echo form_input('telephone',set_value('telephone',$new_committee_member->telephone))?></td>
  </tr>
  <tr>
  	<td>Email</td>
  	<td><?php echo form_input('email',set_value('email',$new_committee_member->email))?></td>
  </tr>
  <tr>
  	<td>Facebook link</td>
  	<td><?php echo form_input('facebook_url',set_value('facebook_url',$new_committee_member->facebook_url))?></td>
  </tr>
  <tr>
  	<td></td>
  	<td><?php echo form_submit('submit','Submit','class = "btn btn-primary"')?></td>
  </tr>
  
</table>


<?php echo form_close()?>
<?php endif;?>


