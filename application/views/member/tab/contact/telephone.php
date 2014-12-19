<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Telephone</div>
  <div class="panel-body">
    <p>Primary Telephone: 
    <?php if(count($member->telephones) > 1):?>
    <select name='primary_telephone'>
    <?php foreach ($member->telephones as $telephone_ob):?>
    	<option value="<?php echo $telephone_ob->telephone?>" <?php if($telephone_ob->primary == 1) echo 'selected'?> >
    	<?php echo $telephone_ob->telephone?>
    	</option>
    <?php endforeach;?>
    </select>
    <input type="submit" class='btn btn-primary' name='submit_primary_telephone' value='Save'>
    <?php else :?>
    	<?php echo $member->telephones[0]->telephone?>
    <?php endif;?>
    </p>
  </div>

  <!-- List group -->
  <ul class="list-group">
  	<?php foreach ($member->telephones as $telephone_ob):?>
    <li class="list-group-item">
    	<span class='telephone_no'><?php echo $telephone_ob->telephone?></span> 
	    <?php if ($telephone_ob->primary != 1): ?>
	    <a href="#" class="deleteTelephone">delete</a>
	    <?php endif;?>
    </li>
    <?php endforeach;?>
  </ul>
  
  <li class="list-group-item"><button class="btn btn-success" id="addNewTelephoneBtn" >Add new</button></li>
  
  <div id='addNewTelephoneBlock' style="display: none">
  	<li class="list-group-item">
  		<input type="text" name='new_telephone' id='new_telephone'>
  		<?php echo form_dropdown('visibility',config_item('telephone_visibility'),"id='visibility'")?>
  		<button id='addNewTelephone'>add</button>
  	</li>
  	
  </div>
</div>

<script>
	$(function(){
		$('#addNewTelephoneBtn').click(function(){
			$('#addNewTelephoneBlock').toggle();

			});
		
		$('#addNewTelephone').click(function(){
			var newTelephone = $("input[name=new_telephone]").val();
			var visibility = $("select[name=visibility]").val();

			addNewTelephone(newTelephone,visibility);
		});
		
		$('.deleteTelephone').click(function(e){
			e.preventDefault();
			var telephone = $(this).prev("span[class=telephone_no]").text();			
			deleteTelephone(telephone);
		});

	});

	function addNewTelephone(newTelephone, visibility){
				
			var request = $.ajax({
                url: '<?php echo site_url('member/add_new_telephone')?>',
                type: "POST",
                data: { telephone : newTelephone, visibility: visibility },
                dataType: "html"
                });

				request.done(function( response ) {
					$("#telephonePanel").html(response);
				//console.log(response);
				
			});
		
	}
	function deleteTelephone(telephone){
		var request = $.ajax({
            url: '<?php echo site_url('member/delete_telephone')?>',
            type: "POST",
            data: { telephone : telephone },
            dataType: "html"
            });

			request.done(function( response ) {
				$("#telephonePanel").html(response);
			//console.log(response);
			
		});
	}
</script>