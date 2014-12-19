<?php

class Member extends Member_Controller
{


    public function __construct (){
            parent::__construct();
            $this->data['meta_title'] = 'Member';         
            $this->load->library('sms');
            
            
                    
    }
/*
 * index 
 */
    public function index(){
        $this->load->view('member/tab/contact/telephone',$this->data);
        
       // echo $str;
    }
 /*
  * dashboard
  */   
    public function dashboard(){
    	
    	$this->data['districts'] = $this->district_m->get_all_id_name();
    	if($district_id = $this->data['member']->district_id){
    		$this->data['thanas'] = $this->thana_m->get_by(array('district_id' => $district_id));
    	}
    	
        $this->data['subview'] = 'member/dashboard';
        $this->load->view('_main_layout', $this->data);
    }
    
    public function update_info(){
    	if (!isset($_POST['submit_update_info'])) {
    		redirect('member/dashboard');
    	}
    }
/*
 * login
 */
    public function login(){
    	
    	$dashboard = 'member/dashboard';
        if($this->member_m->Loggedin() == TRUE){
            redirect($dashboard);
        }
        
        $rules = array(
            'telephone' => array(
                'field' => 'telephone',
                'label' => 'Phone Number',
                'rules' => 'required'
            ),
            'password' => array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required'
            ),
        );
        
        $this->form_validation->set_rules($rules);
    	if ($this->form_validation->run()) {
    		// We can login and redirect
    		if ($this->member_m->login() == TRUE) {
    			redirect($dashboard);
    		}
    		else {
    			$this->session->set_flashdata('login_error', 'That phone/password was wrong');
    			redirect('member/login', 'refresh');
    		}
    	}
        $this->data['subview'] = 'member/login';
        $this->load->view('_main_layout', $this->data);
    }
 /*
  * Registration
  */   
    public function registration(){
       $dashboard = 'member/dashboard';
       if($this->member_m->Loggedin() == TRUE){
           redirect($dashboard);
       }
        
    	$this->data['districts'] = $this->district_m->get_all_id_name();
        $rules = array(
            'telephone' => array(
                'field' => 'telephone',
                'label' => 'Phone Number',
                'rules' => 'required|trim|xss_clean|'
                . 'callback__valid_telephone'
            ),
            'name' => array(
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'required|trim|ucwords'
            ),
        	'district_id' => array(
        		'field' => 'district_id',
        		'label' => 'District',
        		'rules' => 'required|trim'
        		),
            'password' => array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required|min_length[6]'
            ),
            'confirm_password' => array(
                'field' => 'confirm_password',
                'label' => 'Confirm Password',
                'rules' => 'required|matches[password]'
            ),
            'blood_group' => array(
                'field' => 'blood_group',
                'label' => 'Blood Group',
                'rules' => 'required'
            ),
            'gender' => array(
                'field' => 'gender',
                'label' => 'Gender',
                'rules' => 'required'
            ),
            'last_donation_date' => array(
                'field' => 'last_donation_date',
                'label' => 'Last Donation Date',
                'rules' => ''
            ),
        );
        
        $this->form_validation->set_rules($rules);
        
        if($this->form_validation->run()){
             //generate a random key
            $random_key = rand(100000,999999);      
            
           
            
            
            //add the user to the temp_users
            if($temp_user_id = $this->temp_user_m->add_temp_user($random_key)){
                //send the random_key to the user mobile through SMS
                //echo 'temporary user added';
            	 $GSM = $this->input->post('telephone');
            	 $this->_send_registration_sms($GSM, $random_key);
            	
                
                
                redirect('member/complete_registration');
            }
        }
        
        $this->data['subview'] = 'member/registration';
        $this->load->view('_main_layout', $this->data);
    }
    

/*
 * complete registration
 */    
    public function complete_registration($resend_code = NULL) {
    	//prevent user from direct url access to this method
    	if (!$_SERVER['HTTP_REFERER']) redirect('member/registration');
    	$temp_user_telephone = $this->session->userdata('temp_user_telephone');
        if($resend_code == 'resend' && !empty($temp_user_telephone )){
        	$GSM = $this->session->userdata('temp_user_telephone');
        	$temp_user = $this->temp_user_m->get_by(array('telephone' => $GSM),true);
        	
        	if(!empty($temp_user)){
        		$this->_send_registration_sms($GSM, $temp_user->key);
        		redirect('member/complete_registration');
        	}
        }
        if(empty($temp_user_telephone)){
        	redirect('member/registration');
        }
        
        $rules = array(
            'key' => array(
                'field' => 'key',
                'label' => 'KEY',
                'rules' => 'required|numeric|callback__key_match'
            )
        );
        
        $this->form_validation->set_rules($rules);
        
        if($this->form_validation->run()){
            $temp_user_telephone = $this->session->userdata('temp_user_telephone');
            if($new_user_id = $this->temp_user_m->transfer_to_user($temp_user_telephone)){
            	
            	$this->session->set_userdata('member_id',$new_user_id);
            	$this->session->set_userdata('member_loggedin',true);
                $this->session->set_flashdata('reg_complete','Congratulations! Your registration is complete.');
                redirect('member/dashboard');
            }
            
            
        }
        
        $this->data['subview'] = 'member/complete_registration';
        $this->load->view('_main_layout', $this->data);
    }
    
    public function add_new_telephone(){
    	if($this->input->post('telephone')){
    	$data = array(
    		'telephone' => $this->input->post('telephone'),
    			'visibility' => $this->input->post('visibility'),
    			'verified' => 0,
    			'member_id' => $this->data['member']->member_id
    	);
    	
    	if(bangladeshi_telephone($data['telephone']) && 
    		$this->member_telephone_m->telephone_exists($data['telephone']) == false)
    	{
    		
    		$this->member_telephone_m->save($data);
    		 
    		redirect('member/add_new_telephone');
    	}
    	}
    	
    	$this->load->view('member/tab/contact/telephone',$this->data);
    	
    }
    
    public function delete_telephone(){
    	if($this->input->post('telephone')){		
    		    	
    			$this->member_telephone_m->delete($this->input->post('telephone'));
    			 
    			redirect('member/delete_telephone');
    		
    	}
    	 
    	$this->load->view('member/tab/contact/telephone',$this->data);
    }
    
    public function recover_password(){
        $rules = array(
            
        );
        
        $this->form_validation->set_rules($rules);
        
        if($this->form_validation->run()){
            
        }
        
        $this->data['subview'] = 'recover_password';
        $this->load->view('_main_layout', $this->data);
    }

    public function logout(){
    	$this->member_m->logout();
    	redirect('');
    }
    
    //callback function _unique_email()
    public function _unique_email ()
	{
		$id = $this->uri->segment(4);
		$this->db->where('email', $this->input->post('email'));
                if($id){
                   $this->db->where('id !=', $id); 
                }
		
		$user = $this->user_m->get();
		
		if (count($user)) {
			$this->form_validation->set_message('_unique_email', '%s should be unique');
			return FALSE;
		}
		
		return TRUE;
	}
    /**
     * check whether request telephone is valid
     * 
     * @param string $telephone
     * @return boolean
     */   
    public function _valid_telephone($telephone){
      
     
      if(bangladeshi_telephone($telephone) == false){
          $this->form_validation->set_message('_valid_telephone',
                  'Please enter a valid mobile number');
          return FALSE;
      }
      elseif($this->member_telephone_m->get_member_id($telephone)) {
	      	$this->form_validation->set_message('_valid_telephone',
	      			'Telephone already registered!');
	      	return FALSE;
      }elseif($this->temp_user_m->telephone_exists($telephone) == true){
    		redirect('member/complete_registration');
    	}
      else {
      	return TRUE;
      }
    }
    
    /*
     * this callback function process the given telephone number
     * and redirect the request if needed
     */
    public function _process_telephone($telephone) {
        //telephone is already in users_table
        if($this->user_m->telephone_exist($telephone)){
            $this->form_validation->set_message("user's phone $telephone "
                    . "already registered in our database"
                    . "please Login");
            return FALSE;
        }
        //telephone is already in temp_users_table
        //if TRUE redirect to complete registration page
        elseif($this->temp_user_m->telephone_exist($telephone)){
             redirect("member/complete_registration?telephone=$telephone");
        }
        
        //telephone is already in members_table
        if($this->member_m->telephone_exist($telephone)){
            redirect("member/recover_password?telephone=$telephone");
        }
        
        //telephone is brand new!
    }
    
    
    
    /*
     * 
     */
    public function _key_match($key){
        $temp_user_telephone = $this->session->userdata('temp_user_telephone');
        if($this->temp_user_m->key_matching($temp_user_telephone, $key)){
            return TRUE;
        }
        else {
            $this->form_validation->set_message('_key_match','provided key does not match to the system');
            return FALSE;
        }
    }
    /**
     * redirect to complete_registration form 
     * if telephone already exists in temp_user table
     */
    public function _check_temp_user($telephone){
    	if($this->temp_user_m->telephone_exists($telephone) == true){
    		redirect('member/complete_registration');
    	}else {
    		return TRUE;
    	}
    }
    
    private function _send_registration_sms($GSM, $key){
    	
    	if($this->session->userdata('sms_id')){
    		$this->session->unset_userdata('sms_id');
    	}
    	
    	$SMSText = 'Your Badhan registration key is: '.$key ;
    	$sms_status = $this->sms->send($GSM, $SMSText);
    	
    	if(is_numeric($sms_status) == false){
    		$this->session->set_flashdata('sms_failed',$sms_status);
    	}else {
    		$this->session->set_userdata('sms_id',$sms_status);
    	}
    }
    
    
    
}