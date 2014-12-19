<?php
class Committee_M extends MY_Model {
	
	protected $_table_name = 'central_committee';	
	protected $_order_by = 'committee_year';                
        
	
	function __construct() {
		parent::__construct();
                
  
	}
	
	public function get_all_committee_years(){
		$query = "SELECT distinct committee_year FROM {$this->_table_name}";
		$years = $this->db->query($query)->result();
		dump($years);
		
	}
           
       
        
 
        
}

