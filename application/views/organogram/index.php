
<div class='container'>
<?php 
// 	dump($parent);
// 	dump($organogram);
// 	dump($institution);
// 	dump($geolocation);
?>

<div class="well text-center " style="position: relative; top: 5px;">
<h4><?php echo $organogram->name_in_bangla?> | <?php echo $organogram->name?></h4> 
<h5><a href='<?php echo site_url('committee/index/'.$organogram->organogram_id)?>'>Committee</h5>

</div>
<!--load organogram info -->
<div classs='row-fluid'>
<?php 
	if(!empty($organogram)){
		$this->load->view('organogram/module/organogram_info');
	}
?>
<!--load parent info -->

<?php 
	if(!empty($parent)){
		$this->load->view('organogram/module/parent_info');
	}
?>

</div>
<!--load childs info -->
<div class='row-fluid col-md-12'>
<?php 
	if(!empty($childs)){
		$this->load->view('organogram/module/childs_info');
	}
?>
</div>
</div>


