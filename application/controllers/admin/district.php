<?php

class District extends Admin_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('district_m');
        $this->load->model('geolocation_m');
    }
    
    public function index()
	{      
                //count all district
               $count =  $this->data['count'] = $this->db->count_all_results($this->district_m->_table_name);
                //setup pagination
                $per_page = 10;
                if($count > $per_page){
                        $this->load->library('pagination');
			$config['base_url'] = site_url('admin/district/index/');
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
                //fetch limited districts
                $this->db->limit($per_page, $offset);
		$this->data['districts'] = $this->district_m->get();
		
                $this->data['subview'] = 'admin/district/index';
		$this->load->view('admin/_layout_main', $this->data);
	}
        
    public function view($id = NULL){
           if(!$id){
               $this->data['districts'] = $this->district_m->get();
           } 
           else{
               $this->data['district'] = $this->district_m->get($id, TRUE);
           }
           
           $this->data['subview'] = 'admin/district/view';
           $this->load->view('admin/_layout_main', $this->data);
     }
     /*
      * ADD or EDIT district
      */   
    public function edit ($id = NULL)
	{
		// Fetch a district or set a new one
		if ($id) {
			$district = $this->data['district'] = $this->district_m->get($id);
                        if(!count($district)){
                            show_error('No district found');
                        }else {
                           $this->data['geolocation']  = $this->geolocation_m->get_latitude_longitude($district->geolocation_id);
                        }  
		}
		else {
			$district = $this->data['district'] = $this->district_m->get_new();
                        $this->data['geolocation'] = $this->geolocation_m->get_new();
		}
		
		// Set up the form               
		$rules = array(
                        'name' => array(
                                'field' => 'name', 
                                'label' => 'District Name', 
                                'rules' => 'trim|required|xss_clean'
                        ), 
                        'name_in_bangla' => array(
                                'field' => 'name_in_bangla', 
                                'label' => 'District Name', 
                                'rules' => 'trim|required|xss_clean'
                        ),
                        'division_name' => array(
                                'field' => 'division_name', 
                                'label' => 'Division Name', 
                                'rules' => 'trim|required'
                        ), 
                        'geolocation' => array(
                                'field' => 'geolocation', 
                                'label' => 'Geolocation', 
                                'rules' => 'required'
                        )
                    );
		
		$this->form_validation->set_rules($rules);
		
		// Process the form
		if ($this->form_validation->run() == TRUE) {
			$data['district'] = $this->district_m->array_from_post(array(
                            'name',
                            'name_in_bangla', 
                            'division_name',                           
                            ));
                        
			$data['geolocation'] = $this->input->post('geolocation');
                        $data['district']['geolocation_id'] = $this->geolocation_m->save($data['geolocation'], $district->geolocation_id);
			$this->district_m->save($data['district'], $id);
			redirect('admin/district');
		}
		
		// Load the view
		$this->data['subview'] = 'admin/district/edit';
		$this->load->view('admin/_layout_main', $this->data);
	}
        
        public function delete($id){                       
            $this->district_m->delete($id);            
            redirect($this->input->server('HTTP_REFERER'));
        }
        
}