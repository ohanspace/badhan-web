
<!--load page head-->
<?php $this->load->view('components/page_head');?>
<!--/.end page head-->

<body>

    
<div class="top">
   <div class="container">
       <div class="row-fluid">
           <ul class="phone-mail">
               <li><i class="fa fa-phone"></i><span><?php echo $badhan_config['telephone']?></span> | <span><?php echo $badhan_config['telephone2']?></span></li>
               <li><i class="fa fa-envelope"></i><span><a  href="mailto:<?php echo $badhan_config['info_email']?>" target="_top" style="color: inherit;"><?php echo $badhan_config['info_email']?></a></span></li>
           </ul>
           
           <ul class="loginbar">
           <li><a href="http://badhan.org:2096" class="login-btn">Email Box</a></li> 
           <li class="devider">&nbsp;</li>
             <?php if($this->session->userdata('member_loggedin') == TRUE):?>
                <li class="dropdown">
                     <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                       <?php echo $member->name;?> <span class="caret"></span>
                     </a>
                     <ul class="dropdown-menu">
                         <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('member/dashboard');?>">My Profile</a></li>
                         <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo site_url('member/logout');?>">Logout</a></li>                       
                     </ul>
                 </li>
             <?php else:?> 
            	          
                <li><a href="#" class="login-btn">Help</a></li>
                <li class="devider">&nbsp;</li>
                <li><a href="<?php echo site_url('member/login');?>">Login</a></li>
                

                <li class="devider">&nbsp;</li>
                <li><a href="<?php echo site_url('member/registration');?>" class="login-btn">Register</a></li>
             <?php endif; ?>
           </ul>
       </div>
   </div>
</div>
	
    <!-- topHeaderSection -->	
<div class="topHeaderSection">		
    <div class="header">
       <div class="container" >
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
                <a class="navbar-brand" href="<?php echo site_url('index.php');?>"><img src="<?php echo site_url($badhan_config['logo_uri'])?>" alt="BADHAN" /></a>
            </div>
            <div class="navbar-collapse collapse">
               <ul class="nav navbar-nav navbar-right">
				<li class="active"><a href="<?php echo site_url()?>">Homepage</a></li>
				
				<li class="dropdown"><a  class="dropdown-toggle" data-toggle="dropdown" href="#">Zones<b class="caret"></b></a>
					<ul class="dropdown-menu">
					   <li><span class="badge">  <?php echo count($zones) ?> Zones</span></li>
						<?php foreach ($zones as $zone):?>
						<li><a href="<?php echo site_url($zone->short_name)?>"><?php echo $zone->name?></a></li>
						<?php endforeach;?>
					</ul>
				</li>
				<li class="dropdown"><a  class="dropdown-toggle" data-toggle="dropdown" href="#">Individual Units<b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><span class="badge">  <?php echo count($individual_units) ?> Individual Units</span></li>
						<?php foreach ($individual_units as $iu):?>
						<li><a href="<?php echo site_url($iu->short_name)?>"><?php echo $iu->name?></a></li>
						<?php endforeach;?>
					</ul>
				</li>
				<li class="dropdown"><a  class="dropdown-toggle" data-toggle="dropdown" href="#">Families<b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><span class="badge">  <?php echo count($familys) ?> Families</span></li>
						<?php foreach ($familys as $family):?>
						<li><a href="<?php echo site_url(($family->parent_id == 1)? $family->short_name: $this->organogram_m->get_parent($family->parent_id)->short_name.'/'.$family->short_name)?>"><?php echo $family->name?></a></li>
						<?php endforeach;?>
					</ul>
				</li>
				
				<li><a href="<?php echo site_url('explore')?>">Map</a></li>
				<li><a href="http://blog.badhan.org">Blog</a></li>
				</ul>
            
                
            </div>
          
<!--           /.nav-collapse -->
        </div>
    </div>
</div>

     



 
 <!--load subview-->	
<?php $this->load->view($subview); ?>
 <!--/.end subview-->
 
 <!--load page tail-->
<?php $this->load->view('components/page_tail');?>
<!--/.end page tail-->