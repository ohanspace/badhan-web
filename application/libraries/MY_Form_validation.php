<?php

class MY_Form_validation extends CI_Form_validation{
    
    function __construct() {
        parent::__construct();
    }


    /*
    * this callback function returns TRUE if 
    * given telephone is Bangladeshi valid mobile number
    */    
    public function _valid_telephone($telephone){
      
      $pattern = '/^[0][1](1|5|6|7|8|9)\d{8}$/';
      if(preg_match($pattern, $telephone)==1){
          return TRUE;
      }
      else {
          $this->set_message('_valid_telephone',
                  'Please Enter a valid Phone Number');
          return FALSE;         
      }
    }
    
    
    
}