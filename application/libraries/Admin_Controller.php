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
                    'admin/user/login', 
                    'admin/user/logout'
            );
            if (in_array(uri_string(), $exception_uris) == FALSE) {
                    if ($this->admin_m->loggedin() == FALSE) {
                            redirect('admin/user/login');
                    }                  
            }

    }
}