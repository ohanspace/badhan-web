<?php

class Hospital extends Admin_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('hospital_m');
        $this->load->model('geolocation_m');
        $this->load->model('district_m');
    }
    
    public function index ()
	{
                //count all hospital
               $count =  $this->data['count'] = $this->db->count_all_results($this->hospital_m->_table_name);
                //setup pagination
                $per_page = 10;
                if($count > $per_page){
                        $this->load->library('pagination');
			$config['base_url'] = site_url('admin/hospital/index/');
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
                $this->db->order_by($this->hospital_m->_primary_key);
		$this->data['hospitals'] = $this->hospital_m->get_with_district_name();
		$this->data['subview'] = 'admin/hospital/index';
		$this->load->view('admin/_layout_main', $this->data);
	}
        
    public function view($id = NULL){
           if(!$id){
               $this->data['hospitals'] = $this->hospital_m->get();
           } 
           else{
               $this->data['hospital'] = $this->hospital_m->get($id, TRUE);
           }
           
           $this->data['subview'] = 'admin/hospital/view';
           $this->load->view('admin/_layout_main', $this->data);
     }
     /*
      * ADD or EDIT hospital
      */   
    public function edit ($id = NULL)
	{
		// Fetch a hospital or set a new one
		if ($id) {
                    $hospital = $this->data['hospital'] = $this->hospital_m->get($id);
                    if(!count($hospital)){
                        show_error('No hospital found');
                    }
                    $this->data['geolocation']  = $this->geolocation_m->get_latitude_longitude($hospital->geolocation_id);
                     
		}
		else {
			$this->data['hospital'] = $this->hospital_m->get_new();
                        $this->data['geolocation'] = $this->geolocation_m->get_new();
		}
                               
		$this->data['districts']=  $this->district_m->get_all_id_name();
                               
		// Set up the form               
		$rules = array(
                        'name' => array(
                                'field' => 'name', 
                                'label' => 'Hospital Name', 
                                'rules' => 'trim|required|xss_clean'
                        ),
                        'short_name' => array(
                                'field' => 'short_name', 
                                'label' => 'Hospital Short Name', 
                                'rules' => 'trim|xss_clean|callback__unique_short_name'
                        ),
                        'name_in_bangla' => array(
                                'field' => 'name_in_bangla', 
                                'label' => 'Hospital Name', 
                                'rules' => 'trim|xss_clean'
                        ),
                        'type' => array(
                                'field' => 'type', 
                                'label' => 'Hospital Type', 
                                'rules' => 'trim|xss_clean'
                        ),
                        'district_id' => array(
                                'field' => 'district_id', 
                                'label' => 'District ID', 
                                'rules' => 'trim|required'
                        ), 
                        'address' => array(
                                'field' => 'address', 
                                'label' => 'Address', 
                                'rules' => 'trim|xss_clean'
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
			$data['hospital'] = $this->hospital_m->array_from_post(
                                    array(
                                        'name',
                                        'name_in_bangla', 
                                        'short_name',
                                        'type',
                                        'district_id',
                                        'address',                                                                                
                                        ));
			$data['hospital']['name'] = ucwords($data['hospital']['name']);
                        $data['hospital']['short_name'] = strtoupper($data['hospital']['short_name']);
                        
                        $data['geolocation'] = $this->input->post('geolocation');
                        $data['hospital']['geolocation_id'] = $this->geolocation_m->save($data['geolocation'], $hospital->geolocation_id);
                     
			$this->hospital_m->save($data['hospital'], $id);
			redirect('admin/hospital');
		}
		
		// Load the view
		$this->data['subview'] = 'admin/hospital/edit';
		$this->load->view('admin/_layout_main', $this->data);
	}
        public function delete($id){
                    
            $this->hospital_m->delete($id);            
            redirect($this->input->server('HTTP_REFERER'));
        }
        
        
        /*
         * callback function
         */
        function _unique_short_name($str){
                $id = $this->uri->segment(4);
		$this->db->where('short_name', ucwords($str));
                if($id){
                    $this->db->where("{$this->hospital_m->_primary_key} !=", $id);                  
                }
                $short_name = $this->hospital_m->get();                
		if (count($short_name)) {
			$this->form_validation->set_message('_unique_short_name', '%s hospital short name is Already Exist');
			return FALSE;
		}
		
		return TRUE;
        }
}