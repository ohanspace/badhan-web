<?php

class Member extends Admin_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('member_m');
        $this->load->model('member_telephone_m');
        $this->load->model('unit_m');
        $this->load->model('zone_m');
        
    }
    
    public function index ()
	{
                $this->data['zones'] = $this->zone_m->get();
                $this->data['units'] = $this->unit_m->get();
		$this->data['subview'] = 'admin/member/index';
		$this->load->view('admin/_layout_main', $this->data);
	}
        
    public function view($id = NULL){
           if(!$id){
               $this->data['members'] = $this->member_m->get();
           } 
           else{
               $this->data['member'] = $this->member_m->get($id, TRUE);
           }
           
           $this->data['subview'] = 'admin/member/view';
           $this->load->view('admin/_layout_main', $this->data);
     }
     
     /*
      * Add new member of a unit
      */
     public function add($unit_id = NULL){
         if(!$unit_id){
             show_error('no unit selected');
             
         }
         $unit = $this->data['unit'] = $this->unit_m->get($unit_id, TRUE);
         $this->data['member'] = $this->member_m->get_new();
         $this->data['member_telephone'] = $this->member_telephone_m->get_new();
         
         $rules = array(
                'telephone' => array(
                    'field' => 'telephone', 
                    'label' => 'Telephone', 
                    'rules' => 'trim|required|xss_clean'
                ),
                'name' => array(
                    'field' => 'name', 
                    'label' => 'Institution Name', 
                    'rules' => 'trim|required|xss_clean'
                ),             
                'name_in_bangla' => array(
                        'field' => 'name_in_bangla', 
                        'label' => 'Bengali Name ', 
                        'rules' => ''
                ),
                'blood_group' => array(
                   'field' => 'blood_group',
                   'label' => 'Blood Group',
                   'rules' => 'required'
               ),
                'gender' => array(
                   'field' => 'gender',
                   'label' => 'Gender',
                   'rules' => 'required'
                   ),
                'last_donation_date' => array(
                    'field' => 'last_donation_date',
                    'label' => 'Last Donation Date',
                    'rules' => ''
                ),
                'last_donation_date' => array(
                    'field' => 'room_no',
                    'label' => 'Room no',
                    'rules' => ''
                ),
                'student_id' => array(
                       'field' => 'student_id',
                       'label' => 'Student ID',
                       'rules' => ''
                   ),
                 'year' => array(
                       'field' => 'year',
                       'label' => 'Year',
                       'rules' => ''
                   ),
             'batch' => array(
                       'field' => 'batch',
                       'label' => 'Batch',
                       'rules' => ''
                   ),
         );
         
         $this->form_validation->set_rules($rules);
         if($this->form_validation->run() == TRUE){
             $data = $this->member_m->array_from_post(array(
                 'telephone',
                 'name',
                 'name_in_bangla',
                 'blood_group',
                 'gender',
                 'last_donation_date',
                 'total_donation',
                 'room_no',
                 'student_id',
                 'year',
                 'batch'
             ));
             
             foreach ($data as $key => $value) {
                                if(empty($value)){
                                    $data[$key] = NULL;
                                }   
                         }
             
             
             $data['member'] = array(
                 'name' => $data['name'],
                 'name_in_bangla' => $data['name_in_bangla'],
                 'blood_group' =>  $data['blood_group'],
                 'gender' => $data['gender'],
                 'last_donation_date' => $data['last_donation_date'],
                 'total_donation' => $data['total_donation'],
                 'room_no' => $data['room_no'],
                 'student_id' => $data['student_id'],
                 'year' => $data['year'],
                 'batch' => $data['batch'],
                 
                 'unit_id' => $unit_id,
                 'occupation' => 'STUDENT',                                                  
             );
             
             $member_id = $this->member_m->save($data['member']);
             
             $data['member_telephone'] = array(
                 'telephone' => $data['telephone'],
                 'member_id' => $member_id,
                 'visibility' => 1,
                 'primary' => 1,
                 'verified' => 0
             );
             $this->member_telephone_m->save($data['member_telephone']);
             
             redirect($this->input->server('HTTP_REFERER'));
         }
         
         
         // Load the view
        $this->data['subview'] = 'admin/member/add';
        $this->load->view('admin/_layout_main', $this->data);
     }


     /*
      * ADD / EDIT Member
      */
      public function edit ($id = NULL)
	{
		// Fetch a member or set a new one
		if ($id) {
			$member = $this->data['member'] = $this->member_m->get($id);
                        if(!count($member)){
                            show_error('member not found');
                        }else{
                            
                             //$this->data['geolocation']  = $this->geolocation_m->get_latitude_longitude($office_info->geolocation_id);
                        }
		}
		else {
                    show_error('membr not found');
                        
		}
                
                $this->load->model('zone_m');   
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
			$data = $this->member_m->array_from_post(
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
                        if($data['zone_id'] == 'NULL'){
                            $data['zone_id'] = NULL;
                        }
                        $office_info_id = $this->office_info_m->save($data['office_info'], $member->office_info_id);
                        $data['member'] = array(
                            'name' => ucwords($data['name']),
                            'name_in_bangla' => $data['name_in_bangla'],
                            'short_name' => strtoupper($data['short_name']),
                            'institution_id' => $data['institution_id'],
                            'zone_id' => $data['zone_id'],
                            'office_info_id' => $office_info_id                                                      
                        );			                        
                       
                        
			$this->member_m->save($data['member'], $id);
			redirect('admin/member');
		}
		
		// Load the view
		$this->data['subview'] = 'admin/member/edit';
		$this->load->view('admin/_layout_main', $this->data);
	}
        
        public function get_member_json($telephone = NULL){
            
            $member_id = $this->member_telephone_m->get_member_id($telephone);
            if($member_id){
                $this->db->select("member_id, name, unit_id");
                $member = $this->member_m->get($member_id,TRUE);
                echo json_encode($member);
            }  else {
                return NULL;
            }
            
        }

                public function delete ($id)
	{
		$this->member_m->delete($id);
		redirect('admin/member');
	}
}