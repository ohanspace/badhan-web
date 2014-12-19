<?php

class User_M extends MY_Model {
	
	protected $_table_name = 'users';	
	protected $_order_by = 'id';
              
	
	function __construct() {
		parent::__construct();
	}
        
        public function login ()
	{
		$user = $this->get_by(array(
			'telephone' => $this->input->post('telephone'),
			'password' => $this->hash($this->input->post('password')),
		), TRUE);
		
		if (count($user)) {
                        //fetch the users membership data
                        $member = $this->member_m->get($user->member_id, TRUE);
			// setting user session data
			$data = array(
				
				'telephone' => $user->telephone,
				'user_id' => $user->id,
                                'role' => $user->role,
				'loggedin' => TRUE,
                                
                                'name' => $member->name,
                                'unit_id' => $member->unit_id,
                                
			);
			
                        $this->session->set_userdata($data);
		}
	}

	public function logout ()
	{
		$this->session->sess_destroy();
	}

	public function loggedin ()
	{
		return (bool) $this->session->userdata('loggedin');
	}

	public function hash ($string)
	{
		return hash('sha512', $string . config_item('encryption_key'));
	}
        
        /*
         * telephone exist function return
         * TRUE if given telephone is in users_table
         * FALSE if does not exist
         */
        public function telephone_exist($telephone) {
            $user = $this->get_by(array(
			'telephone' => $telephone,			
		), TRUE);
            if(count($user)){
                return TRUE;
            }else{
                return FALSE;
            }
                
        }
        
        /*
         * 
         */
        
        
        public function get_new(){
		$user = new stdClass();
		$user->name = '';
		$user->email = '';
		$user->password = '';
		return $user;
	}
        
}

