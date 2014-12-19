<?php
class Zone_committee_M extends MY_Model {
	
	protected $_table_name = 'zone_committee';	
	protected $_order_by = 'zone_id, committee_year'; 

	public $rules = array(
    		
    			'name' => array(  		
    					'field' => 'name',
    					'label' => 'Member name',
    					'rules' => 'required'
    			),
				
    			'name_in_bangla' => array(
    					'field' => 'name_in_bangla',
    					'label' => 'Member name in bangla',
    					'rules' => 'required'
	    			),
							
    			'designation_id' => array(
    					'field' => 'designation_id',
    					'label' => 'designation',
    					'rules' => 'required'
    			),
    			'blood_group' => array(
    					'field' => 'blood_group',
    					'label' => 'Blood Group',
    					'rules' => 'required'
    			),    			
    			'session' => array(
    					'field' => 'session',
    					'label' => 'session',
    					'rules' => ''
    			),
    			'telephone' => array(
    					'field' => 'telephone',
    					'label' => 'Telephone',
    					'rules' => 'required|_valid_telephone'
    			),
    			'email' => array(
    					'field' => 'email',
    					'label' => 'Email',
    					'rules' => 'email'
    			),
    			'facebook_url' => array(
    					'field' => 'facebook_url',
    					'label' => 'Facebook Link',
    					'rules' => ''
    			),
    	);
        
	
	function __construct() {
		parent::__construct();
                
  
	}
	/*
	 * array('2014' => '2014' , '2013'=>'2013')
	 */
	public function get_all_committee_years($zone_id){
		$query = "SELECT distinct committee_year FROM {$this->_table_name}
					WHERE zone_id = $zone_id";
		$years = $this->db->query($query)->result_array();
		$array = NULL;
		foreach ($years as $year){
			$array[$year['committee_year']] = $year['committee_year'];
		}
		return $array;
		
	}
	
	public function get_committee_members($zone_id,$year){
		$query = "SELECT zone_committee.*,designation.name as designation_name, unit.name as unit_name
					FROM `zone_committee` LEFT JOIN unit USING(unit_id)
					JOIN designation using(designation_id)
					WHERE zone_committee.zone_id = {$zone_id} AND committee_year = {$year}
					ORDER BY designation.order";
		
		return $this->db->query($query)->result();
	}
	
	public function get_new(){
		$new_committee_member = new stdClass();
		
		$new_committee_member->designation_id = '';
		$new_committee_member->name = '';
		$new_committee_member->name_in_bangla = '';
		$new_committee_member->blood_group = '';
		$new_committee_member->unit_id = '';
		$new_committee_member->session = '';
		$new_committee_member->telephone = '';
		$new_committee_member->email = '';
		$new_committee_member->facebook_url = '';
		return $new_committee_member;
	}
	
	
           
       
        
 
        
}

