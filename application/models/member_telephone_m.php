<?php

class Member_telephone_M extends MY_Model {
	
	public $_table_name = 'member_telephone';
        public $_primary_key = 'telephone';
	protected $_order_by = 'primary desc';
              
	
	function __construct() {
		parent::__construct();
	}
        
        
        function get_new(){
            $member_telephone = new stdClass();
            $member_telephone->telephone = NULL;
            $member_telephone->member_id = NULL;
            $member_telephone->visibility = NULL;
            return $member_telephone;
        }
        
        
        function get_member_id($telephone = NULL){
            $member = $this->get_by(array('telephone' => $telephone), TRUE);
            if(count($member)){               
                $member_id = $member->member_id;
            }  else {
               $member_id = NULL; 
            }
            return $member_id;
        }
        
        /*
         * telephone exist function return
        * TRUE if given telephone is in tem_users_table
        * FALSE if does not exist
        */
        public function telephone_exists($telephone) {
        	$telephone = $this->get_by(array(
        			'telephone' => $telephone,
        	), TRUE);
        	if(count($telephone)){
        		return $telephone;
        	}else{
        		return FALSE;
        	}
        
        }
}