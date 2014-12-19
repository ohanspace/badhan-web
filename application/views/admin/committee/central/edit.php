<?php if(!empty($this->session->flashdata('saved_notification'))):?>
<div class='alert alert-info'>
<?php echo $this->session->flashdata('saved_notification')?>
</div>

<?php endif;?>
<?php echo validation_errors()?>
<?php echo form_open()?>

<table class='table'>
  
  <tr>
    <td>Designation</td>
    <td><?php echo form_dropdown('designation_id',$central_committee_designations,$committee_member->designation_id)?></td>
  </tr>
  <tr>
  	<td>Name</td>
  	<td><?php echo form_input('name',$committee_member->name)?></td>
  </tr>
  <tr>
  	<td>Name In Bangla</td>
  	<td><?php echo form_input('name_in_bangla',$committee_member->name_in_bangla)?></td>
  </tr>
  <tr>
  	<td>Blood Group</td>
  	<td><?php echo form_dropdown('blood_group',$blood_groups,$committee_member->blood_group)?></td>
  </tr>
  <tr>
  	<td>Institution</td>
  	<td><?php echo form_dropdown('institution_id',$institutions,$committee_member->institution_id)?></td>
  </tr>
  <tr>
  	<td>Session</td>
  	<td><?php echo form_input('session',$committee_member->session)?></td>
  </tr>
  <tr>
  	<td>Telephone</td>
  	<td><?php echo form_input('telephone',$committee_member->telephone)?></td>
  </tr>
  <tr>
  	<td>Email</td>
  	<td><?php echo form_input('email',$committee_member->email)?></td>
  </tr>
  <tr>
  	<td>Facebook link</td>
  	<td><?php echo form_input('facebook_url',$committee_member->facebook_url)?></td>
  </tr>
  <tr>
  	<td></td>
  	<td><?php echo form_submit('submit','Submit','class = "btn btn-primary"')?></td>
  </tr>
  
</table>


<?php echo form_close()?>