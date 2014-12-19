<?php
class Member_Controller extends MY_Controller{

    function __construct (){
            parent::__construct();
            $this->data['meta_title'] = 'Badhan member Panel';
                   
            
            
    
           // Login check
           $exception_uris = array(
                'member/login', 
                'member/logout',
           		'member/registration',
           		'member/complete_registration',
           		'member/complete_registration/resend'
           );
           if (in_array(uri_string(), $exception_uris) == FALSE) {
                   if ($this->member_m->loggedin() == FALSE) {
                           redirect('member/login');
                   }                  
           }
           

    }
}