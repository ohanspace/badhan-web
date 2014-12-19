<h2>Web Site State</h2>
<?php if($current_state == 'ON'): ?> 
     <div class="alert alert-success">
         <h3>Site is currently ONLINE</h3>
         <a href="<?php echo site_url('admin/website_state/go_offline');?>" class="btn btn-danger">Go Offline</a>
     </div> 
<?php elseif($current_state == 'OFF'): ?>
     <div class="alert alert-danger">
         <h3>Site is currently OFFLINE</h3>
         <a href="<?php echo site_url('admin/website_state/go_online');?>" class="btn btn-success">Go Online</a>
     </div>  
<?php endif;?>