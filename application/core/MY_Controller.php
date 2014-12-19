<?php 
class MY_Controller extends CI_Controller
{
    
    public $data = array();
    
    public function __construct() {
        parent::__construct();
        //Error bucket
        $this->data['errors'] = array();
        //load badhan config variable
        $this->data['badhan_config'] = config_item('badhan');
        //meta title or page title
        $this->data['meta_title'] = $this->data['badhan_config']['meta_title'];
        
       
        
        //Load all models from Models directory
        $this->load->helper('directory');
        $map_model = directory_map(APPPATH.'models');
        foreach ($map_model as $model){
        	if(preg_match('/(.+_m)\.php$/', $model,$a)){
        		$this->load->model($a[1]);
        	}
        }
        
        if($this->member_m->loggedin() == true){
        	$this->data['member'] = $this->member_m->get($this->session->userdata('member_id'),true);
        	$member = $this->data['member'];
        	$this->data['member']->district = $this->district_m->get($member->district_id);
        	$this->data['member']->telephones = $this->member_telephone_m->get_by(
        			array('member_id' => $member->member_id));
        	$this->data['member']->details = $this->member_details_m->get($member->member_id);
        }
        
        $this->data['zones'] = $this->organogram_m->get_zones();
        $this->data['individual_units'] = $this->organogram_m->get_individual_units();
        $this->data['familys'] =  $this->organogram_m->get_familys();
     // dump($this->data['familys']);
    }
}
