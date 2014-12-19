<?php

class Explore extends Frontend_Controller{
    
    public function __construct() {
        parent::__construct();      
    }
    
    public function index() {
    	$this->data['organograms_json'] = $this->organogram_m->get_organogram_json();
    	// Load the view
    	$this->data['subview'] = 'templates/explore/index';
    	$this->load->view('_main_layout', $this->data);
    }
    
   
}