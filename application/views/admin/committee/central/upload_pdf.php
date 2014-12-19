
<?php if(!empty($uploaded_data) OR !empty($error)):?>
<div class='alert alert-info'>
<?php echo $error?>
<?php if(!empty($uploaded_data)):?>
pdf successfully added : <a href='<?php echo site_url($central_committee_pdf_files_dir.$uploaded_data['file_name'])?>'><?php echo $uploaded_data['file_name']?></a>
<?php endif;?>
</div>
<?php endif;?>
<?php echo validation_errors()?>
<?php echo form_open_multipart('admin/central_committee/upload_pdf');?>

Committee_year: 
<input type="text" name="committee_year" />
<br>

<input type="file" name="userfile" size="20" />

<br/>

<input type="submit" name='submit' value="upload" />


</form>
