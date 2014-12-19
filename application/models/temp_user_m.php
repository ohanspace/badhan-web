<?php

class Temp_user_M extends MY_Model {
	
	protected $_table_name = 'temp_user';	
	protected $_order_by = 'created desc';
    protected $_created_timestamp = TRUE;
                
	
	function __construct() {
		parent::__construct();
               
                $this->load->model('member_m');
                $this->load->model('member_telephone_m');
	}
        
        
       public function add_temp_user($key){
          
                $data = $this->array_from_post(array(
                    'telephone',
                    'name',
                	'district_id',                                
                    'password',
                    'gender',
                    'blood_group',
                    'last_donation_date'
              ));
            
           $data['last_donation_date'] = empty_to_null($data['last_donation_date']);
            $data['password'] = $this->hash($data['password']);
            $data['key'] = $key;
            $record_id = $this->save($data);
            if($record_id){
                //record inserted
               
               $this->session->set_userdata('temp_user_telephone',$data['telephone']);
                return $record_id;
            }else{
                return false;
            }
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
            $query_string = "created < (CURRENT_TIMESTAMP - $life_minute*60)";            
            $this->db->where($query_string);
            $this->db->delete($this->_table_name);
            
            return TRUE;
        }
        
        
        /*
         * telephone exist function return
         * TRUE if given telephone is in tem_users_table
         * FALSE if does not exist
         */
        public function telephone_exists($telephone) {
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
         * 
         */
        public function key_matching($temp_user_telephone,$key){
            $where = array(
                'telephone' => $temp_user_telephone,
                'key' => $key
            );
            $temp_user = $this->get_by($where, TRUE);
            if(count($temp_user)){               
                return TRUE;
            }else{
                return FALSE;
            }
        }
        
        /*
         * this function transfer a record
         * FROM temp_users table
         * TO users table
         * after transfer complete delete the temp_user data
         */
        public function transfer_to_user($telephone) {
            $temp_user = $this->get_by(array('telephone' => $telephone), true);
			if(empty($temp_user)){
				return FALSE;
			}
            
            $data['member'] = array(
                'name' => $temp_user->name, 
            	'password' => $temp_user->password,
            	'district_id' => $temp_user->district_id,
                'blood_group' => $temp_user->blood_group,
                'gender' => $temp_user->gender,
                'last_donation_date' => $temp_user->last_donation_date,
            );
            
            $data['member_telephone'] = array(            	
            	'telephone' => $temp_user->telephone,
            	'verified' => 1,
            	'primary' => 1,
            	'visibility' => 1
            );                      
            
            $this->db->trans_start();
                $new_member_id = $this->member_m->save($data['member']);
                $data['member_telephone']['member_id'] = $new_member_id;
                $this->member_telephone_m->save($data['member_telephone']);
                $this->delete($temp_user->id);
            $this->db->trans_complete();
            
            if($new_member_id){
                return $new_member_id;
            }
            else {
                return false;
            }
        }
}

