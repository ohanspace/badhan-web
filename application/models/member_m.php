<?php

class Member_M extends MY_Model {
	
	public $_table_name = 'member';
    public $_primary_key = 'member_id';
	protected $_order_by = 'member_id';
    protected $_created_timestamp = TRUE;
                
	
	function __construct() {
		parent::__construct();
                $this->load->model('member_telephone_m');
	}
        
        /*
         * Authentiction functions
         * 
         */
        
       public function login ()
	{
           $member_id = $this->member_telephone_m->get_member_id($this->input->post('telephone'));
           if(!$member_id){
               return FALSE;
           }
		$member = $this->get_by(array(
			'member_id' => $member_id,
			'password' => $this->hash($this->input->post('password')),
		), TRUE);
		
		if (count($member)) {
			// Log in member
			$data = array(
				'name' => $member->name,
				'telephone' => $this->input->post('telephone'),
				'member_id' => $member->member_id,
				'member_loggedin' => TRUE,
				'role' => $member->role,
				'role_for' => $member->role_for, //which organogram node he can access
			);
			$this->session->set_userdata($data);
		}
	}
	
	public function admin_loggedin(){
		
		$role = $this->session->userdata('role');	
		if($this->loggedin() == true && $role != 5){
			return true;
		}else return false;
		
	}
	public function logout ()
	{
		$this->session->sess_destroy();
	}

	public function loggedin ()
	{
		return (bool) $this->session->userdata('member_loggedin');
	}

	public function hash ($string)
	{
		return hash('sha512', $string . config_item('encryption_key'));
	}
        
        public function get_new(){
		$member = new stdClass();
		$member->name = NULL;
		$member->name_in_bangla = NULL;
                $member->username = NULL;
                $member->password= NULL;              
                $member->gender = NULL;             
                $member->blood_group = NULL;
                $member->birthday= NULL;
                $member->last_donation_date = NULL;
                $member->last_donation_place = NULL;
                $member->total_donation = NULL;
                $member->eagerness_scale = 3;
                $member->occupation = 'STUDENT';
                $member->email = NULL;
                $member->facebook_id = NULL;
                $member->unit_id = NULL;                
                $member->address = NULL;
                $member->geolocation_id = NULL;
		return $member;
	}
        
       
        
}

