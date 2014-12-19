<?php

class Address extends Frontend_Controller{
    function __construct() {
        parent::__construct();
    }
    
    public function index($param){
        if(is_numeric($param)){
            $this->db->where('unit_id' , $param);
            $_address_template = 'unit';
            $method = 'row';
            $this->data['has_geolocation'] = TRUE;
        }
        elseif ($param == 'Individual_Units') {           
            $this->db->where('zone_short_name is null');
            $_address_template = 'individual_unit';
            $method = 'result';
            
        }
        else{            
            $this->db->where('zone_short_name', $param);
            $_address_template = 'zone';
            $method = 'result';
            $this->data['has_geolocation'] = TRUE;
        }
        
        $this->data['unit_info'] = $this->db->get('unit_info')->$method();
        if(empty($this->data['unit_info'])){
            show_404();
        }
        
        if($_address_template == 'zone'){
            $this->db->where('short_name', $param);
            $this->data['zone_info'] = $this->db->get('zone_info')->row();
        }
        
        $this->data['subview'] = 'address/'.$_address_template;
        $this->load->view('_main_layout', $this->data);
        //dump($data);
    }
}