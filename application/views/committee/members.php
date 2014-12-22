<div class= 'container'>
<h3><?php echo $committee->committee_title?><span class='badge'> Total member : <?php echo count($committee_members)?></span></h3>
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
    <th>Institution Name</th>
    <th>Education Level</th>
    <th>Session</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>
  <?php foreach ($committee_members as $committee_member):?>
  <tr>
    <td><?php echo $committee_designations[$committee_member->designation_id]?></td>
    <td><?php echo $committee_member->name?></td>
    <td><?php echo $committee_member->name_in_bangla?></td>
    <td><?php echo $committee_member->blood_group?></td>
    <td><?php echo $committee_member->telephone?></td>
    <td><?php echo $committee_member->institution_name?></td>
    <td><?php echo $committee_member->edu_level?></td>
    <td><?php echo $committee_member->edu_session?></td>
    <td><a href="<?php echo site_url('committee/edit_member/'.$committee_member->id)?>">Edit</a></td>
    <td><a href="<?php echo site_url('committee/delete_member/'.$committee_member->id)?>">delete</a></td>
  </tr>
  <?php endforeach;?>
</table>

<?php endif;?>

<!-- Add committee member -->
<?php if ($committee->editable == 1): ?>
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
    <td><?php echo form_dropdown('designation_id',$committee_designations,$new_committee_member->designation_id)?></td>
  </tr>
  <tr>
  	<td>Name</td>
  	<td><?php echo form_input('name',$new_committee_member->name)?></td>
  </tr>
  <tr>
  	<td>Name In Bangla</td>
  	<td><?php echo form_input('name_in_bangla',$new_committee_member->name_in_bangla)?></td>
  </tr>
  <tr>
  	<td>Blood Group</td>
  	<td><?php echo form_dropdown('blood_group',config_item('blood_groups'),$new_committee_member->blood_group)?></td>
  </tr>
  <tr>
  	<td>Institution</td>
  	<td><?php echo form_dropdown('institution_id',$institutions,$new_committee_member->institution_id)?></td>
  </tr>
  <tr>
  	<td>Education level</td>
  	<td><?php echo form_dropdown('edu_level',config_item('edu_level'),$new_committee_member->edu_level)?></td>
  </tr>
  <tr>
  	<td>Session</td>
  	<td><?php echo form_input('edu_session',$new_committee_member->edu_session)?></td>
  </tr>
  <tr>
  	<td>Telephone</td>
  	<td><?php echo form_input('telephone',$new_committee_member->telephone)?></td>
  </tr>
  <tr>
  	<td>Email</td>
  	<td><?php echo form_input('email',$new_committee_member->email)?></td>
  </tr>
  <tr>
  	<td>Facebook link</td>
  	<td><?php echo form_input('facebook_url',$new_committee_member->facebook_url)?></td>
  </tr>
  <tr>
  	<td></td>
  	<td><?php echo form_submit('submit','Submit','class = "btn btn-primary"')?></td>
  </tr>
  
</table>


<?php echo form_close()?>
<?php endif;?>

</div>
