<?php

class Thana extends Admin_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('thana_m');
        $this->load->model('geolocation_m');
        $this->load->model('district_m');
    }
    
    public function index ()
	{
                //count all thana
               $count =  $this->data['count'] = $this->db->count_all_results($this->thana_m->_table_name);
                //setup pagination
                $per_page = 10;
                if($count > $per_page){
                        $this->load->library('pagination');
			$config['base_url'] = site_url('admin/thana/index/');
			$config['total_rows'] = $count;
			$config['per_page'] = $per_page;
			$config['uri_segment'] = 4;
                        
			$this->pagination->initialize($config);
			$this->data['pagination'] = $this->pagination->create_links();
			$offset = $this->uri->segment(4);
                        
		}
		else {
			$this->data['pagination'] = '';
			$offset = 0;
		}
                //fetch limited departments
                $this->db->limit($per_page, $offset);
                $this->db->order_by($this->thana_m->_primary_key);
		$this->data['thanas'] = $this->thana_m->get_with_district_name();
		$this->data['subview'] = 'admin/thana/index';
		$this->load->view('admin/_layout_main', $this->data);
	}
        
    public function view($id = NULL){
           if(!$id){
               $this->data['thanas'] = $this->thana_m->get();
           } 
           else{
               $this->data['thana'] = $this->thana_m->get($id, TRUE);
           }
           
           $this->data['subview'] = 'admin/thana/view';
           $this->load->view('admin/_layout_main', $this->data);
     }
     /*
      * ADD or EDIT thana
      */   
    public function edit ($id = NULL)
	{
		// Fetch a thana or set a new one
		if ($id) {
                    $thana = $this->data['thana'] = $this->thana_m->get($id);
                    if(!count($thana)){
                        show_error('No thana found');
                    }
                    $this->data['geolocation']  = $this->geolocation_m->get_latitude_longitude($thana->geolocation_id);
                     
		}
		else {
			$this->data['thana'] = $this->thana_m->get_new();
                        $this->data['geolocation'] = $this->geolocation_m->get_new();
		}
                               
		$this->data['districts']=  $this->district_m->get_all_id_name();
                               
		// Set up the form               
		$rules = array(
                        'name' => array(
                                'field' => 'name', 
                                'label' => 'Thana Name', 
                                'rules' => 'trim|required|xss_clean'
                        ),
                        
                        'name_in_bangla' => array(
                                'field' => 'name_in_bangla', 
                                'label' => 'Thana Name', 
                                'rules' => 'trim|xss_clean'
                        ),
                        
                        'district_id' => array(
                                'field' => 'district_id', 
                                'label' => 'District ID', 
                                'rules' => 'trim|required'
                        ), 
                        
                        'geolocation' => array(
                                'field' => 'geolocation', 
                                'label' => 'Geolocation', 
                                'rules' => ''
                        ),                       
                    
                    );
		
		$this->form_validation->set_rules($rules);
		
		// Process the form
		if ($this->form_validation->run() == TRUE) {
			$data['thana'] = $this->thana_m->array_from_post(
                                    array(
                                        'name',
                                        'name_in_bangla', 
                                        'district_id',                                                                               
                                        ));
			$data['thana']['name'] = ucwords($data['thana']['name']);
                        
                        $data['geolocation'] = $this->input->post('geolocation');
                        $data['thana']['geolocation_id'] = $this->geolocation_m->save($data['geolocation'], $thana->geolocation_id);
                     
			$this->thana_m->save($data['thana'], $id);
			redirect('admin/thana');
		}
		
		// Load the view
		$this->data['subview'] = 'admin/thana/edit';
		$this->load->view('admin/_layout_main', $this->data);
	}
        public function delete($id){
                    
            $this->thana_m->delete($id);            
            redirect($this->input->server('HTTP_REFERER'));
        }
        
             
}