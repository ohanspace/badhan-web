<?php $this->load->view('admin/components/page_head'); ?>

<body style="background: #555;">
 

  <div class="modal-dialog">
    <div class="modal-content">

        <?php 
            $this->load->view($subview); //data['subview'] set in user controller
        ?>
      
      <div class="modal-footer">
          &copy; <?php echo date('Y'); echo '-'.$meta_title; ?>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->



      
<?php $this->load->view('admin/components/page_tail'); ?>  