<?php

class Central_committee extends Admin_Controller{
	
    
    function __construct() {
        parent::__construct();
        $this->data['central_committee_pdf_files_dir'] = 'uploads/pdf/committee/central/';
        $this->load->helper('directory');
        
    }
    public function index(){
    	
    	$this->data['central_committee_pdf_files'] = directory_map($this->data['central_committee_pdf_files_dir'], 1);
    	$this->data['committee_years'] = $this->central_committee_m->get_all_committee_years();
    	
    	$rules = array(
    		
    			'new_committee_year' => array(  		
    					'field' => 'new_committee_year',
    					'label' => 'Committee year',
    					'rules' => 'required|exact_length[4]'
    			),
    		);
    	$this->form_validation->set_rules($rules);
    	if($this->form_validation->run()){
    		redirect('admin/central_committee/view/'.$this->input->post('new_committee_year'));
    	}
    	
    	$this->data['subview'] = 'admin/committee/central/index';
    	$this->load->view('admin/_layout_main',$this->data);
    }
    
    public function view($year = NULL){
    	
    	if(preg_match('/\d{4}/', $year)){
    		$this->data['committee_year'] = $year; 
    		$year_ = $year + 1;
    		$this->data['committee_session'] = $year.'-'.$year_ ;
    		$this->data['committee_members'] = $this->central_committee_m->get_committee_members($year);
    		$this->data['blood_groups'] = config_item('blood_groups');   		
    		$this->data['central_committee_designations'] = $this->committee_designation_m->get_designations_array('central');
    		$this->data['institutions'] = $this->institution_m->get_operate_institutions_array();
    		
    		$this->data['new_committee_member'] = $this->central_committee_m->get_new();
    	}else {
    		redirect('admin/central_committee/');
    	}
    	
    	
    	
    	$this->form_validation->set_rules($this->central_committee_m->rules);
    	if($this->form_validation->run()){
    		$data = $this->central_committee_m->array_from_post(array(
    			
    				'name','name_in_bangla','designation_id','blood_group','institution_id','session','telephone','email','facebook_url'
    		));
    		$data['committee_year'] = $year;
    		
    		$new_row_id = $this->central_committee_m->save($data);
    		if($new_row_id){
    			$this->session->set_flashdata('new_committee_member_id',$new_row_id);
    		}
    		
    		header('Location:'.$_SERVER['HTTP_REFERER']);
    	}
    	
    	
    	
    	
    	$this->data['subview'] = 'admin/committee/central/view';
    	$this->load->view('admin/_layout_main',$this->data);
    }
    
    public function edit($id){
    	if($id){
    		$this->data['committee_member'] = $this->central_committee_m->get($id,TRUE);
    		
    		$this->data['blood_groups'] = config_item('blood_groups');
    		$this->data['central_committee_designations'] = $this->committee_designation_m->get_designations_array('central');
    		$this->data['institutions'] = $this->institution_m->get_operate_institutions_array();
    	}
    	
    	$this->form_validation->set_rules($this->central_committee_m->rules);
    	if($this->form_validation->run()){
    		$member_data = $this->central_committee_m->array_from_post(array(
    				'name','name_in_bangla','designation_id','blood_group','institution_id','session','telephone','email','facebook_url'
    				
    		));
    		$this->central_committee_m->save($member_data,$id);
    		$this->session->set_flashdata('saved_notification','modification complete!');
    		
    		redirect('admin/central_committee/view/'.$this->data['committee_member']->committee_year);
    	}
    	
    	
    	$this->data['subview'] = 'admin/committee/central/edit';
    	$this->load->view('admin/_layout_main',$this->data);
    }
    
    public function delete($id){
    	if($id){
    		$this->central_committee_m->delete($id);
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