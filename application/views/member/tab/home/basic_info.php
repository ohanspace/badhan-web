<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Basic Info</div>
  <div class="panel-body">
  <h4>About me</h4>
  <?php if(!empty($member->details->about_me)):?>
    <p><?php echo $member->details->about_me?></p>
    <?php else :?>
    <p>(Nothing to display)</p>
    <?php endif;?>
  </div>

  <!-- List group -->
  <ul class="list-group">
  <?php if(!empty_date($member->birthday)):?>
    <li class="list-group-item"><span class='glyphicon glyphicon-calendar'></span> Date of Birth: <?php echo $member->birthday?> (<?php echo calculate_age($member->birthday)?> years)</li>
   <?php endif;?>
    <li class="list-group-item">Dapibus ac facilisis in</li>
    <li class="list-group-item">Morbi leo risus</li>
    <li class="list-group-item">Porta ac consectetur ac</li>
    <li class="list-group-item">Vestibulum at eros</li>
  </ul>
</div>