<?php

class Family extends Admin_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('family_m');
        $this->load->model('office_info_m');
        $this->load->model('geolocation_m');
        
    }
    
    public function index ()
	{
		$this->data['familys'] = $this->family_m->get();
		$this->data['subview'] = 'admin/family/index';
		$this->load->view('admin/_layout_main', $this->data);
	}
        
    public function view($id = NULL){
           if(!$id){
               $this->data['familys'] = $this->family_m->get();
           } 
           else{
               $this->data['family'] = $this->family_m->get($id, TRUE);
           }
           
           $this->data['subview'] = 'admin/family/view';
           $this->load->view('admin/_layout_main', $this->data);
     }
     
     /*
      * ADD / EDIT Family
      */
      public function edit ($id = NULL)
	{
		// Fetch a family or set a new one
		if ($id) {
			$family = $this->data['family'] = $this->family_m->get($id);
                        if(!count($family)){
                            show_error('family not found');
                        }else{
                            $office_info = $this->data['office_info'] = $this->office_info_m->get($family->office_info_id, TRUE);
                             $this->data['geolocation']  = $this->geolocation_m->get_latitude_longitude($office_info->geolocation_id);
                        }
		}
		else {
			$family = $this->data['family'] = $this->family_m->get_new();                        
                        $office_info = $this->data['office_info'] = $this->office_info_m->get_new();
                        $this->data['geolocation'] = $this->geolocation_m->get_new();
                        
		}
                                           
				$this->data['zones'] = $this->zone_m->get_all_id_name();
                $this->load->model('institution_m');
                $this->data['institutions'] = $this->institution_m->get_all_id_name_type();
		
		// Set up the form               
		$rules = array(
                        'name' => array(
                                'field' => 'name', 
                                'label' => 'Institution Name', 
                                'rules' => 'trim|required|xss_clean'
                        ),
                        'short_name' => array(
                                'field' => 'short_name', 
                                'label' => 'Institution Short Name', 
                                'rules' => 'trim|xss_clean'
                        ),
                        'name_in_bangla' => array(
                                'field' => 'name_in_bangla', 
                                'label' => 'Bengali Name ', 
                                'rules' => ''
                        ),
                        'instituion_id' => array(
                                'field' => 'institution_id', 
                                'label' => 'Institution Name', 
                                'rules' => ''
                        ),
                        'zone_id' => array(
                        		'field' => 'zone_id',
                        		'label' => 'zone name',
                        		'rules' => ''
                        ),
                    
                        
                        'address' => array(
                                'field' => 'address', 
                                'label' => 'Address', 
                                'rules' => ''
                        ),
                        'address2' => array(
                                'field' => 'address2', 
                                'label' => 'Address', 
                                'rules' => ''
                        ),
                        'telephone' => array(
                                'field' => 'telephone', 
                                'label' => 'Telephone', 
                                'rules' => ''
                        ),
                        'telephone2' => array(
                                'field' => 'telephone2', 
                                'label' => 'Telephone2', 
                                'rules' => ''
                        ),
                        'telephone3' => array(
                                'field' => 'telephone3', 
                                'label' => 'Telephone3', 
                                'rules' => ''
                        ),
                        'geolocation' => array(
                                'field' => 'geolocation', 
                                'label' => 'Geolocation', 
                                'rules' => ''
                        ),
                        'office_open_time' => array(
                                'field' => 'office_open_time', 
                                'label' => 'Office Open Time', 
                                'rules' => ''
                        ),
                        'office_close_time' => array(
                                'field' => 'office_close_time', 
                                'label' => 'Office Close Time', 
                                'rules' => ''
                        ),
                        'estd' => array(
                            'field' => 'estd',
                            'label' => 'Establishment Date',
                            'rules' => ''
                        ),
                        'fb_page_link' => array(
                            'field' => 'fb_page_link',
                            'label' => 'Facebook Page Link',
                            'rules' => ''
                        ),
                        'fb_group_link' => array(
                                'field' => 'fb_group_link',
                                'label' => 'Facebook Group Link',
                                'rules' => ''
                            ),
                        'email' => array(
                            'field' => 'email',
                            'label' => 'Email',
                            'rules' => ''
                        ),
                        
                    
                    );
		
		$this->form_validation->set_rules($rules);
		
		// Process the form
		if ($this->form_validation->run() == TRUE) {
			$data = $this->family_m->array_from_post(
                                    array(
                                        'name',
                                        'name_in_bangla', 
                                        'short_name',
                                        'telephone',
                                        'telephone2',
                                        'telephone3',                                       
                                        'institution_id',
                                    	'zone_id',                                       
                                        'address',
                                        'address2',
                                        'office_open_time',
                                        'office_close_time',                                          
                                        'geolocation',
                                        'email',
                                        'estd',
                                        'fb_page_link',
                                        'fb_group_link'
                                        ));
						foreach ($data as $key => $value) {
							if(empty($value)){
								$data[$key] = NULL;
							}
						}
                        $geolocation_id = $this->geolocation_m->save($data['geolocation'], $office_info->geolocation_id );
                        
                        $data['office_info'] = array(
                            'geolocation_id' => $geolocation_id,
                            'address' => $data['address'],
                            'address2' => $data['address2'],
                            'estd' => $data['estd'],
                            'telephone'=> $data['telephone'],
                            'telephone2' => $data['telephone2'],
                            'telephone3' => $data['telephone3'],
                            'email' => $data['email'],
                            'office_open_time' => $data['office_open_time'],
                            'office_close_time' => $data['office_close_time'],
                            'fb_page_link' => $data['fb_page_link'],
                            'fb_group_link' => $data['fb_group_link']
                        );
                        
                        $office_info_id = $this->office_info_m->save($data['office_info'], $family->office_info_id);
                        $data['family'] = array(
                            'name' => ucwords($data['name']),
                            'name_in_bangla' => $data['name_in_bangla'],
                            'short_name' => strtoupper($data['short_name']),
                            'institution_id' => $data['institution_id'],
                        	'zone_id' => $data['zone_id'],
                            'office_info_id' => $office_info_id                                                      
                        );			                        
                       
                        
			$this->family_m->save($data['family'], $id);
			redirect('admin/family');
		}
		
		// Load the view
		$this->data['subview'] = 'admin/family/edit';
		$this->load->view('admin/_layout_main', $this->data);
	}
    public function delete ($id)
	{
		$this->family_m->delete($id);
		redirect('admin/family');
	}
}