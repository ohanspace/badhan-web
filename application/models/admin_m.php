<?php

class admin_M extends MY_Model {
	
	protected $_table_name = 'admin';	
	protected $_order_by = 'name';
	protected $_created_timestamp = TRUE;
	protected $_primary_key = 'id';
              
	
	function __construct() {
		parent::__construct();
	}
        
        public function login ()
	{
		$admin = $this->get_by(array(
			'telephone' => $this->input->post('telephone'),
			'password' => $this->hash($this->input->post('password')),
		), TRUE);
		
		if (count($admin)) {
                       
			// setting admin session data
			$data = array(
				
				'telephone' => $admin->telephone,				
				'admin_loggedin' => TRUE,                               
                'name' => $admin->name,                             
                                
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
		return (bool) $this->session->userdata('admin_loggedin');
	}

	public function hash ($string)
	{
		return hash('sha512', $string . config_item('encryption_key'));
	}
        
        /*
         * telephone exist function return
         * TRUE if given telephone is in admins_table
         * FALSE if does not exist
         */
        public function telephone_exist($telephone) {
            $admin = $this->get_by(array(
			'telephone' => $telephone,			
		), TRUE);
            if(count($admin)){
                return TRUE;
            }else{
                return FALSE;
            }
                
        }
        
        /*
         * 
         */
        
        
        public function get_new(){
		$admin = new stdClass();
		$admin->name = '';
		$admin->telephone = '';
		$admin->password = '';
		$admin->address = '';
		$admin->email = '';
		return $admin;
	}
        
}

