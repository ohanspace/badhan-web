<?php

class Page extends Frontend_Controller{
    
    public function __construct() {
        parent::__construct();      
    }
    
    public function index() {
    	
    	// Load the view
    	$this->data['subview'] = 'templates/homepage';
    	$this->load->view('_main_layout', $this->data);
    }
    
   
}