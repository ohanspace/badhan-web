<?php $this->load->view('admin/components/page_head'); ?>
<body>
    <nav class="navbar navbar-default" role="navigation">
     <!-- Brand and toggle get grouped for better mobile display -->
     <div class="navbar-header">
       <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
         <span class="sr-only">Toggle navigation</span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
       </button>
         <a class="navbar-brand" href="<?php echo site_url('admin/dashboard'); ?>"><?php echo $meta_title; ?></a>
     </div>

     <!-- Collect the nav links, forms, and other content for toggling -->
     <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
       <ul class="nav navbar-nav">
         <li class="active"><a href="<?php echo site_url('admin/dashboard'); ?>">Dashboard</a></li>
         <li><?php echo anchor('admin/user','User'); ?></li>
         <li><a href="<?php echo site_url('admin/zone'); ?>">Zone</a></li>
         <li><?php echo anchor('admin/unit','Unit'); ?></li>
         <li><?php echo anchor('admin/member','Member'); ?></li>
         <li><?php echo anchor('admin/committee','Committee'); ?></li>
         <li><?php echo anchor('admin/page','Page'); ?></li>
         
         
       </ul>
       
     </div><!-- /.navbar-collapse -->
    </nav>

    <div class="container">
            <div class="row">
                    <!-- Main column -->
                    <div class="col-md-10">
                        <?php $this->load->view($subview); ?>
                    </div>
                    <!-- Sidebar -->
                    <div class="col-md-2">
                            <section>
                                    <?php echo anchor('admin/user/logout', '<i class="glyphicon glyphicon-off"></i> logout'); ?>
                            </section>
                        <h3>Controllers</h3>
                        <ul class="nav nav-pills nav-stacked">
                            
                            <li> <?php 
                                
                                $this->load->helper('file');
                                $files = get_dir_file_info(APPPATH.'controllers/admin', FALSE);

                                // Loop through file names removing .php extension
                                foreach (array_keys($files) as $file)
                                {
                                    $controller = str_replace(EXT, '', $file);
                                    echo anchor('admin/'.$controller,  ucfirst($controller));
                                } 
                            ?>
                            </li>   
                        </ul>
                    </div>
            </div>
    </div>

<?php $this->load->view('admin/components/page_tail'); ?>
<?php dump($this->session->all_userdata()); ?>