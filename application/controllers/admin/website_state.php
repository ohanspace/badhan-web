<?php
 class Website_state extends Admin_Controller{
      private $path; 
     
      function __construct() {
         parent::__construct();
         $this->load->helper('file');
         $this->path  = APPPATH.'config/website_state';
     }

     public function index(){             
        $this->data['current_state'] = read_file($this->path);
        
        
        
        $this->data['subview'] = 'admin/website_state/index';
        $this->load->view('admin/_layout_main',  $this->data);
     }
     
     public function go_offline(){
         $data = 'OFF';
        write_file($this->path, $data);
        redirect('admin/website_state');
     }
     public function go_online(){
         $data = 'ON';
        write_file($this->path, $data);
        redirect('admin/website_state');
     }
 }