<?php
class Admin_Controller extends MY_Controller{

    function __construct (){
            parent::__construct();
            $this->data['meta_title'] = 'Badhan Admin Panel';
            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->config->load('form_validation');
                   
            
            
            // Login check
            $exception_uris = array(
                    'member/login', 
                    'member/logout'
            );
            if (in_array(uri_string(), $exception_uris) == FALSE) {
                    if ($this->member_m->admin_loggedin() == FALSE) {
                            redirect('member/login');
                    }                  
            }

    }
}