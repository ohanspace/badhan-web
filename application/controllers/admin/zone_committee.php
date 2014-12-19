<?php

class Zone_committee extends Admin_Controller{
	
    
    function __construct() {
        parent::__construct();
        $this->data['central_committee_pdf_files_dir'] = 'uploads/pdf/committee/central/';
        $this->load->helper('directory');
        
    }
    public function index($zone_short_name = NULL){
    	if ($zone_short_name) {
    		$zone = $this->data['zone'] = $this->zone_m->get_by(array('short_name'=> $zone_short_name),TRUE);
    		//$this->data['zone_committee_pdf_files'] = directory_map($this->data['zone_committee_pdf_files_dir'], 1);
    		$this->data['committee_years'] = $this->zone_committee_m->get_all_committee_years($zone->zone_id);
    	}else {
    		$this->data['zones'] = $this->zone_m->get_zones_short_name_with_name();
    	}
    	
    	$rules = array(
    	
    			'new_committee_year' => array(
    					'field' => 'new_committee_year',
    					'label' => 'Committee year',
    					'rules' => 'required|exact_length[4]'
    			),
    	);
    	$this->form_validation->set_rules($rules);
    	if($this->form_validation->run()){
    		redirect('admin/zone_committee/view/'.$zone_short_name.'/'.$this->input->post('new_committee_year'));
    	}
    	
    	
    	
    	$this->data['subview'] = 'admin/committee/zone/index';
    	$this->load->view('admin/_layout_main',$this->data);
    }
    
    public function view($zone_short_name,$year = NULL){
    	
    	if($zone_short_name && preg_match('/\d{4}/', $year)){
    		$this->data['zone_short_name'] = $zone_short_name;
    		$zone = $this->data['zone'] = $this->zone_m->get_by(array('short_name'=> $zone_short_name),TRUE);
    		$this->data['committee_year'] = $year;     		
    		$this->data['committee_members'] = $this->zone_committee_m->get_committee_members($zone->zone_id,$year);
    		$this->data['blood_groups'] = config_item('blood_groups');   		
    		$this->data['zone_committee_designations'] = $this->committee_designation_m->get_designations_array('zone');
    		$this->data['units_option'] = $this->unit_m->get_all_unit_name_with_id($zone->zone_id);
    		
    		$this->data['new_committee_member'] = $this->zone_committee_m->get_new();
    	}else {
    		redirect('admin/zone_committee/');
    	}
    	
    	
    	
    	$this->form_validation->set_rules($this->zone_committee_m->rules);
    	if($this->form_validation->run()){
    		$data = $this->zone_committee_m->array_from_post(array(
    			
    				'name','name_in_bangla','designation_id','blood_group','unit_id','session','telephone','email','facebook_url'
    		));
    		$data['zone_id'] = $zone->zone_id;
    		$data['committee_year'] = $year;
    		
    		$new_row_id = $this->zone_committee_m->save($data);
    		if($new_row_id){
    			$this->session->set_flashdata('new_committee_member_id',$new_row_id);
    		}
    		
    		header('Location:'.$_SERVER['HTTP_REFERER']);
    	}
    	
    	
    	
    	
    	$this->data['subview'] = 'admin/committee/zone/view';
    	$this->load->view('admin/_layout_main',$this->data);
    }
    
    public function edit($zone_short_name,$id){
    	if($id){
    		$this->data['committee_member'] = $this->zone_committee_m->get($id,TRUE);
    		
    		$this->data['blood_groups'] = config_item('blood_groups');
    		$this->data['zone_committee_designations'] = $this->committee_designation_m->get_designations_array('central');
    		$this->data['units_option'] = $this->unit_m->get_all_unit_name_with_id($this->data['committee_member']->zone_id);
    	}
    	
    	$this->form_validation->set_rules($this->zone_committee_m->rules);
    	if($this->form_validation->run()){
    		$member_data = $this->zone_committee_m->array_from_post(array(
    				'name','name_in_bangla','designation_id','blood_group','unit_id','session','telephone','email','facebook_url'
    				
    		));
    		$this->zone_committee_m->save($member_data,$id);
    		$this->session->set_flashdata('saved_notification','modification complete!');
    		
    		redirect('admin/zone_committee/view/'.$zone_short_name.'/'.$this->data['committee_member']->committee_year);
    	}
    	
    	
    	$this->data['subview'] = 'admin/committee/zone/edit';
    	$this->load->view('admin/_layout_main',$this->data);
    }
    
    public function delete($id){
    	if($id){
    		$this->zone_committee_m->delete($id);
    	}
    	header('Location:'.$_SERVER['HTTP_REFERER']);
    	
    }
    
    public function upload_pdf(){
    	   	   	
    	$this->data['error'] = '';
    	$this->data['uploaded_data'] = '';
    	
    	$rules = array(
    			 
    			'committee_year' => array(
    					'field' => 'committee_year',
    					'label' => 'committee year',
    					'rules' => 'required|exact_length[4]'
    			),
    	);
    	$this->form_validation->set_rules($rules);
    	if($this->form_validation->run()){
    		
    		$config['upload_path'] = $this->data['central_committee_pdf_files_dir'];
    		$config['allowed_types']='pdf';
    		$config['file_name'] = 'central_'.$this->input->post('committee_year').'.pdf';    		
    		$this->load->library('upload',$config);
    		
    		if($this->upload->do_upload()){
    			$this->data['uploaded_data'] = $this->upload->data();   			  		
    		}else {
    			$this->data['error'] = $this->upload->display_errors();
    		}
    	}
    	
    	
    	
    		$this->data['subview'] = 'admin/committee/central/upload_pdf';
    		$this->load->view('admin/_layout_main',$this->data);
    	
    }
   
}