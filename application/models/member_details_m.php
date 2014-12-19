<?php

class Member_details_M extends MY_Model {
	
	public $_table_name = 'member_details';
    public $_primary_key = 'member_id';
	protected $_order_by = 'member_id';
              
	
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
        
        
       
}