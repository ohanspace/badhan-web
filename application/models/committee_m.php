<?php
class Committee_M extends MY_Model {
	
	protected $_table_name = 'committee';	
	protected $_primary_key = 'committee_id';
	protected $_order_by = 'committee_year'; 
	protected $_created_timestamp = true;               
        
	
	function __construct() {
		parent::__construct();
                
  
	}
	
	public function get_existing_committees($organogram_id){
	
		
	}
	
	
           
       
        
 
        
}

