<?php
class Committee_member_M extends MY_Model {
	
	protected $_table_name = 'committee_member';	
	protected $_order_by = 'committee_id'; 
	protected $_created_timestamp = true;  
	protected $_primary_key = 'id';             
        
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
			'institution_id' => array(
					'field' => 'institution_id',
					'label' => 'Institution',
					'rules' => 'required'
			),
			'edu_session' => array(
					'field' => 'edu_session',
					'label' => 'session',
					'rules' => ''
			),
			'edu_level' => array(
					'field' => 'edu_session',
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
	
	public function get_existing_committees($organogram_id){
	
		
	}
           
	public function get_committee_members($committee_id){
		$query = "SELECT committee_member.*,designation.name as designation_name, institution.name as institution_name
		FROM `committee_member` LEFT JOIN institution USING(institution_id)
		JOIN designation using(designation_id)
		WHERE committee_member.committee_id = {$committee_id}
		ORDER BY designation.order";
	
		return $this->db->query($query)->result();
	}

	public function get_new(){
		$new_committee_member = new stdClass();
	
		$new_committee_member->designation_id = '';
		$new_committee_member->name = '';
		$new_committee_member->name_in_bangla = '';
		$new_committee_member->blood_group = '';
		$new_committee_member->institution_id = '';
		$new_committee_member->edu_level = '';
		$new_committee_member->edu_session = '';
		$new_committee_member->telephone = '';
		$new_committee_member->email = '';
		$new_committee_member->facebook_url = '';
		return $new_committee_member;
	}
        
 
        
}

