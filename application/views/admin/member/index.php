<div class="panel panel-info">
    <div class="panel-heading">
        unit selection
    </div>
    <div class="panel-body">
        <form action="<?php echo current_url();?>" class="form-horizontal">
            <!--Select Zone-->
            <div class="form-group">
               <label for="zone_id" class="col-md-4 control-label">Select Zone</label>
               <div class="col-md-8">
                   <select class="form-control selectpicker" name="zone_id" id="zone_id">
                       <option disabled selected >Select a zone</option>
                       <option value="" >Individual Unit</option>
                       <?php if(isset($zones)): foreach ($zones as $zone): ?>
                       <option value="<?php echo $zone->zone_id ?>"><?php echo $zone->name; ?></option>
                       <?php endforeach; endif; ?>
                   </select>
               </div>
           </div>
            <!--Select Unit-->
            <div class="form-group" style="display: none;" id="unit">
                   <label for="unit_id" class="col-md-4 control-label">Select unit</label>
                   <div class="col-md-8">
                       <select class="form-control selectpicker" name="unit_id" id="unit_id">
                           
                       </select>
                   </div>
             </div>
            <div class="col-md-offset-4 col-md-8" style="display:none" id="anchorBlock">
                <a href="#" class="btn btn-success" id="add">ADD New Member</a>
                <a href="#" class="btn btn-info" id="view">View All members</a>
            </div>
        </form>
    </div>
</div>

<script>
 
//script in adminFunction
</script>