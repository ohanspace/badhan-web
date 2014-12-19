<div class="container">
<?php if($this->session->flashdata('reg_complete')):?>
<div class="alert alert-warning alert-dismissible text-center" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  <strong><?php echo $this->session->flashdata('reg_complete')?></strong>
</div>
<?php endif;?>
<div class="well well-lg text-center">
	<?php $this->load->view('member/cover')?>
</div>

<!-- eagerness scale -->
 <div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $member->eagerness_scale?>" aria-valuemin="0" aria-valuemax="4" style="width: <?php echo 100/4*$member->eagerness_scale?>%;">
    <?php echo eagerness_scale_label($member->eagerness_scale)?>
  </div>
</div>

<div>

<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
  <li class="active"><a href="#home" role="tab" data-toggle="tab">Home</a></li>
  <li><a href="#contact" role="tab" data-toggle="tab">Contacts</a></li>
  <li><a href="#details" role="tab" data-toggle="tab">My Details</a></li>
  <li><a href="#settings" role="tab" data-toggle="tab">Settings</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane active" id="home"><?php $this->load->view('member/tab/home')?></div>
  <div class="tab-pane" id="contact"><?php $this->load->view('member/tab/contact')?></div>
  <div class="tab-pane" id="details"><?php $this->load->view('member/tab/details') ?></div>
  <div class="tab-pane" id="settings">...</div>
</div>

</div>

</div>
