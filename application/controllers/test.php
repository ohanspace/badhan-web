<?php
class Test extends CI_Controller{
    function index(){
    	echo site_url('path');
    }
    
    public function error(){
        //echo 'hello';
        log_message('error','bla bla'); //log error in application/logs file
        //show_error('hello');
        //show_error('hi', $status_code = 404, 'heading');
    }
    
    public function date(){
    	last_donation();
    }
    public function  dob(){
    	echo calculate_age('1993-04-04');
    }
    
    public function height(){
    	
    }
 
    public function get_nested() {
        $this->load->model('unit_m');
        dump($this->unit_m->get_nested());
    }
    
    public function geolocation(){
        $this->load->library('geolocation');
        dump($this->geolocation->get_lat_lng());
    }

    public function writing(){
        $this->load->helper('file');
        $path = APPPATH.'config/website_state';
        //echo $path;
        //echo read_file($path);
        $data = 'ONLINE';
        write_file($path, $data);
        echo file_get_contents($path);
    }

        public function sms(){
        
        $this->load->library('sms');
        
        //echo $this->sms->send('01676846989','hello ctg',true);
        echo '<br>'.$this->sms->check_balance();
    }

    public function test_(){
        //dump($this->input->request_headers());
        
    }

        public function test_captcha(){
        $this->load->helper('captcha');
        $vals = array(
            'img_path' => './captcha/',
            'img_url' => site_url().'captcha/',
            'font_path' => './fonts/coopbl.ttf',
            'img_width' => '200',
            'img_height' => '50',
            'expiration' => 10
        );
        
        $cap = create_captcha($vals);
        $this->session->set_userdata('captcha',$cap['word']);
        echo $cap['image'];
        echo $this->session->userdata('captcha');        
    }
    public function date_helper(){
        $this->load->helper('date');
        dump(time());
        dump(now());
        dump(unix_to_human(now()));
        dump(mdate("%Y %m", time()));
        dump(standard_date('DATE_RSS',local_to_gmt()));
        dump(unix_to_human(time(),TRUE,'eu'));
        
    }
    
    public function facebook_request() {
        $this->load->library('facebook_connect');
        $data = array(
            'redirect_uri' => site_url('admin/test_php_code/handle_facebook_login'),
            'scope' => 'user_birthday'
        );
        
        redirect($this->facebook_connect->getLoginUrl($data));
    }
    
    public function handle_facebook_login(){
        $this->load->library('facebook_connect');
       
        $user = $this->facebook_connect->user;
        if(!empty($user)){
            echo '<pre>';
            print_r($user);
            echo '</pre>';
        }else{
            echo 'could not login';
        }
    }

    
    
    public function ajax_test(){
        $this->load->view('test/test_view');
    }
    public function getAllUnits(){
        
       //echo $this->input->get('zone');
        $options = '<option>Unit1</option>';
        $options .= '<option>Unit2</option>';
        echo $options;
        
    }
    
    function institution(){
        $this->load->model('institution_m');
        $this->institution_m->get_all_id_name_type();
    }
        
}