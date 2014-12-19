
<?php if(!empty($committee_years)):?>
<h3>Committee Lists(database):</h3>
<?php foreach ($committee_years as $committee_year):?>
<li><a href='<?php echo site_url('admin/central_committee/view/'.$committee_year)?>'><?php echo $committee_year?></a></li>
<?php endforeach;?>
<?php endif;?>
<!-- add new committee-->
<h4>Add new committee</h4>
<?php echo form_open()?>
Year: 
<?php echo form_input('new_committee_year')?>
<?php echo form_submit('submit','Submit','class = "btn btn-primary"')?>
<?php echo form_close()?>

<!-- PDF -->
<hr>
<h3>Committee Lists (PDF)</h3>
<?php if(!empty($central_committee_pdf_files)): foreach ($central_committee_pdf_files as $file):?>
<li><a href="<?php echo site_url($central_committee_pdf_files_dir.$file)?>"><?php echo $file?></a></li>
<?php endforeach;endif;?>
<h4>Upload committee pdf <a href="<?php echo site_url('admin/central_committee/upload_pdf')?>">Click</a></h4>