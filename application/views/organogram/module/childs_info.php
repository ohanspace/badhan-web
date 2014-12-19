<div class="panel panel-danger col-md-6 ">
  <!-- Default panel contents -->
  <div class="panel-heading">Organograms Under This Zone (<?php echo count($childs)?>)</div>
  <div class="panel-body">
    <p><?php echo $organogram->name?> is organized with these <span class='badge'><?php echo count($childs)?></span> organograms</p>
  </div>

  <!-- List group -->
  <ol class="list-group">
  <?php 
  	foreach ($childs as $child):?>
		<li class="list-group-item">
			<a href="<?php echo site_url($organogram->short_name.'/'.$child->short_name)?>">
				<?php echo $child->name_in_bangla?> | <?php echo $child->name?>
			</a>
		</li>
 <?php endforeach;?>
  </ol>
</div>