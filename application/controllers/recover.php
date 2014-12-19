<?php

class Recover extends Frontend_Controller{

    public function __construct (){
            parent::__construct();
            $this->data['meta_title'] = 'Recover';
            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->config->load('form_validation');
            $this->load->library('session');
            $this->load->model('user_m');
            $this->load->model('temp_user_m');        
            $this->load->model('member_m');
            $this->load->model('recover_m');
            
            // Login check
//            $exception_uris = array(
//                    'member/login', 
//                    'member/logout'
//            );
//            if (in_array(uri_string(), $exception_uris) == FALSE) {
//                    if ($this->user_m->loggedin() == FALSE) {
//                            redirect('admin/user/login');
//                    }                  
//            }

    }


    public function index(){
        echo 'hello worrld';
       // echo $str;
    }
    
    /*
     * Identify member
     */
    public function identify() {
        $rules = array(
            'telephone' => array(
                'field' => 'telephone',
                'label' => 'Phone Number',
                'rules' => 'required|_valid_telephone|callback__user_id'
            ),
        );
        
        $this->form_validation->set_rules($rules);
        
        if($this->form_validation->run()){
            
            
            redirect('recover/initiate'); 
        }
        
        $this->data['subview'] = 'recover/identify';
        $this->load->view('_main_layout', $this->data);
    }
    
    
    /*
     * Initiate 
     */
    public function initiate() {
        
        $this->data['telephone'] = $this->session->userdata('telephone');
        $this->data['user_id'] = $this->session->userdata('user_id');
        
        
        $rules = array(
            'telephone' => array(
                'field' => 'telephone',
                'label' => 'Phone number',
                'rules' => 'required'
            )
        );
        
        $this->form_validation->set_rules($rules);
        
        if($this->form_validation->run()){
            //generate a random key
            $key = rand(100000,999999);
            echo $key;
            //add the user to the recovers tbl
            if($this->recover_m->add_recover($key)){
                //send the random_key to the user mobile through SMS
                echo 'temporary user added';
                /*
                 * IF key succesfully send to user
                 * then show complete registration page
                 * ELSE sms could not be sent 
                 */
                if(0){                  
                    redirect('main/complete_registration');
                }else{
                    
                }
                
            }  else {
                echo 'problem adding to the recovers';  
            }
        }
        
        $this->data['subview'] = 'recover/initiate';
        $this->load->view('_main_layout', $this->data);
    }
    
    /*
     * Code
     */
    public function code() {
        
        $this->data['telephone'] = base64_decode($this->input->get('telephone'));
        $rules = array(
            'key' => array(
                'field' => 'key',
                'label' => 'KEY',
                'rules' => 'required|'
            ),
        );

          $this->form_validation->set_rules($rules);

          if($this->form_validation->run()){

          }

          $this->data['subview'] = 'recover/code';
          $this->load->view('_main_layout', $this->data);
    }
    
    
    /*
     * password
     */
    public function password() {
        $rules = array(

          );

          $this->form_validation->set_rules($rules);

          if($this->form_validation->run()){

          }

          $this->data['subview'] = 'recover/password';
          $this->load->view('_main_layout', $this->data);
        
    }
    
   

   
    
   
    
    public function complete_registration() {  
        $rules = array(
            
        );
        
        $this->form_validation->set_rules($rules);
        
        if($this->form_validation->run()){
            
        }
        
        $this->data['subview'] = 'complete_registration';
        $this->load->view('_main_layout', $this->data);
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
     * this callback function return 
     * FALSE if no corresponding user to the given telephone
     * 
     */
    public function _user_id($telephone){
        
       if($this->user_m->telephone_exist($telephone)){
           $user = $this->user_m->get_by(array(
               'telephone' => $telephone
           ), TRUE);
            
           $this->session->set_userdata('telephone',  $telephone);
           $this->session->set_userdata('user_id',$user->id);
           
           return TRUE;
       }else{
           $this->form_validation->set_message('_user_id',"$telephone does not exist in our user database");
           return FALSE;
       } 
    }
}