<?php

class Committee extends Admin_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('zone_m');
        $this->load->model('unit_m');
        $this->load->model('committee_m');
        
        
        
    }
    
    public function index (){
                //$c_session = new Committee_M('members');
                
		//$this->data['committee_sessions'] = $c_session->get();
		$this->data['subview'] = 'admin/committee/index';               
		$this->load->view('admin/_layout_main', $this->data);
	}
        
    public function step_one(){
                
                // Process the form
		if ($this->form_validation->run() == TRUE) {
                    $data = $this->committee_m->array_from_post(array('type', 'begin_date', 'end_date'));
                    $this->session->set_flashdata('step_one_data',$data);     
                    redirect('admin/committee/step_two');
                        
			
		}
                
                $this->data['subview'] = 'admin/committee/step_one';               
		$this->load->view('admin/_layout_main', $this->data);
    }
    public function step_two(){
                $data = array();
                $data = $this->session->flashdata('step_one_data');
                $this->data['type'] = $data['type'];
                $this->data['begin_date'] = $data['begin_date'];
                $this->data['end_date'] = $data['end_date'];
                
                switch ($this->data['type']){

                    case 'zone':
                        //fetch all zone from zone Table                       
                        $this->data['options'] = $this->zone_m->get_all_zone_name_with_id();
                        break;
                    case 'unit':
                        //fetch all unit from unit table                      
                        $this->data['options'] = $this->unit_m->get_all_unit_name_with_id();
                        break;
                    case 'central':
                        //display the form page with flashdata
                        
                        $this->session->set_flashdata('step_two_data',$data);
                        redirect('admin/committee/form');
                        break;
                }
                // Process the form
		if ($this->form_validation->run() == TRUE) { 
                     $data = $this->committee_m->array_from_post(array('id','type', 'begin_date', 'end_date'));
                     $this->session->set_flashdata('step_two_data',$data);
                     redirect('admin/committee/form');
                        
			
		}
                
                
                $this->data['subview'] = 'admin/committee/step_two';               
		$this->load->view('admin/_layout_main', $this->data);
    }
     
   
    
    public function form(){
        $data = $this->session->flashdata('step_two_data');
        
        if($data['type']== 'unit'){
            //
            $unit = $this->unit_m->get($data['id'],TRUE);
            $data['name']= $unit->name;
            $data['zone_id'] = $unit->zone_id;
        }
        else if($data['type']== 'zone'){
            //
            $zone = $this->zone_m->get($data['id'],TRUE);
            $data['name']= $zone->name;
            
        }
        else $data['name']='';
        
        //
        $this->data['form_title'] = $data['name'].' '.$data['type'].' Committee for '. $data['begin_date'].' to '.$data['end_date'];
        echo $this->data['form_title'];
        
        //$this->data['subview'] = 'admin/committee/form';
        //$this->load->view('admin/_layout_main', $this->data);
        
    }
     
     
}