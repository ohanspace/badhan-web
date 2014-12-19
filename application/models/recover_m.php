<?php

class Recover_M extends MY_Model {
	
	protected $_table_name = 'recovers';	
	protected $_order_by = 'id';
              
	
	function __construct() {
		parent::__construct();
	}
       
      

	public function hash ($string)
	{
		return hash('sha512', $string . config_item('encryption_key'));
	}
        
        public function get_new(){
		$user = new stdClass();
		$user->name = '';
		$user->email = '';
		$user->password = '';
		return $user;
	}
        
        
        function clean_expired_records(){
            //clean records if expired
            $life_minute = 10;
            $query_string = "log_time < (CURRENT_TIMESTAMP - $life_minute*60)";
            echo $query_string;
            $this->db->where($query_string);
            $this->db->delete($this->_table_name);
            
            return TRUE;
        }
        
        
        /*
         * telephone exist function return
         * TRUE if given telephone is in tem_users_table
         * FALSE if does not exist
         */
        public function telephone_exist($telephone) {
            $temp_user = $this->get_by(array(
			'telephone' => $telephone,			
		), TRUE);
            if(count($temp_user)){
                return TRUE;
            }else{
                return FALSE;
            }
                
        }
        
        /*
         * add recovers record
         */
        public function add_recover($key){
        $data = array(
            'user_id' => $this->session->userdata('user_id'),
            'telephone' => $this->session->userdata('telephone'),
            'key' => $key,
            'log_time' => time(),
        );
        
        $query = $this->save($data);
    
        if($query){
            return TRUE;
        }else {
            return FALSE;
        }
    }
}

