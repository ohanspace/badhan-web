<h3>
	<?php echo $member->name?> 
	<span class="badge"><?php echo $member->gender?></span>
	<span class="badge"><?php echo $member->blood_group?></span>
</h3>

 <!-- current district -->
 <p>Current district: <strong><?php echo $member->district->name?></strong></p>
 
<!-- last donation date -->
<p>last donation date: <strong><?php echo last_donation($member->last_donation_date)?></strong></p>

<!-- total donation -->
<p>Total donation: 
	<strong><?php echo $member->total_donation? $member->total_donation.' times' : 'Not specified' ?></strong>
</p>
