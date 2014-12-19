<?php

class Department extends Admin_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('department_m');       
    }
    
    public function index ()
	{
                 //count all department
               $count =  $this->data['count'] = $this->db->count_all_results($this->department_m->_table_name);
                //setup pagination
                $per_page = 10;
                if($count > $per_page){
                        $this->load->library('pagination');
			$config['base_url'] = site_url('admin/department/index/');
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
		
		
		$this->data['departments'] = $this->department_m->get();
		$this->data['subview'] = 'admin/department/index';
		$this->load->view('admin/_layout_main', $this->data);
	}
          
     /*
      * ADD or EDIT department
      */   
    public function edit ($id = NULL)
	{
		// Fetch a department or set a new one
		if ($id) {
			$this->data['department'] = $this->department_m->get($id);
			
		}
		else {
			$this->data['department'] = $this->department_m->get_new();                                                 
		}
                
		
		// Set up the form               
		$rules = array(
                        'name' => array(
                                'field' => 'name', 
                                'label' => 'Name', 
                                'rules' => 'trim|required|xss_clean|callback__unique_name'
                        ),
                        'name_in_bangla' => array(
                                'field' => 'name_in_bangla', 
                                'label' => 'Name in Bangla', 
                                'rules' => 'trim|xss_clean'
                        ),
                        'short_name' => array(
                                'field' => 'short_name', 
                                'label' => 'Department Short Name', 
                                'rules' => 'trim|xss_clean'
                        ),
                                                
                    );
		
		$this->form_validation->set_rules($rules);
		
		// Process the form
		if ($this->form_validation->run() == TRUE) {
			$data = $this->department_m->array_from_post(array(
                            'name',
                            'name_in_bangla',
                            'short_name'                                       
                           ));
			$data['name'] = ucwords($data['name']);
                        $data['short_name'] = strtoupper($data['short_name']);
			$this->department_m->save($data, $id);
			redirect('admin/department');
		}
		
		// Load the view
		$this->data['subview'] = 'admin/department/edit';
		$this->load->view('admin/_layout_main', $this->data);
	}
 
    public function delete ($id)
	{        
           
            $this->department_m->delete($id);
            redirect($this->input->server('HTTP_REFERER'));
	}
        
     public function _unique_name ($str)
	{   
                $id = $this->uri->segment(4);
		$this->db->where('name', ucwords($str));
                if($id){
                    $this->db->where("{$this->department_m->_primary_key} !=", $id);                  
                }
                $name = $this->department_m->get();                
		if (count($name)) {
			$this->form_validation->set_message('_unique_name', '%s department is Already Exist');
			return FALSE;
		}
		
		return TRUE;
	}
}