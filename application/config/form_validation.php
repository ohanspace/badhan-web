<?php
/*
 * this file contains all form validation rules applied in this app or project
 * to load this config file $this->config->load("form_validation");
 */
$config = array(
    
        'unit/add' => array(
                        'name' => array(
                                'field' => 'name', 
                                'label' => 'Unit Name', 
                                'rules' => 'trim|required|xss_clean'
                        ), 
                        'short_name' => array(
                                'field' => 'short_name', 
                                'label' => 'Unit Short Name', 
                                'rules' => 'trim|required'
                        ), 
                        'zone_id' => array(
                                'field' => 'zone_id', 
                                'label' => 'Zone ID', 
                                'rules' => 'trim|required'
                        ),
          ),
        'unit/edit' => array(
                        'name' => array(
                                'field' => 'name', 
                                'label' => 'Unit Name', 
                                'rules' => 'trim|required|xss_clean'
                        ), 
                        'short_name' => array(
                                'field' => 'short_name', 
                                'label' => 'Unit Short Name', 
                                'rules' => 'trim|required'
                        ), 
                        'zone_id' => array(
                                'field' => 'zone_id', 
                                'label' => 'Zone ID', 
                                'rules' => 'trim|required'
                        ),
          ),
    
        'zone/add' => array(
                        'name' => array(
                                'field' => 'name', 
                                'label' => 'Zone Name', 
                                'rules' => 'trim|required|xss_clean'
                        ), 
                        'short_name' => array(
                                'field' => 'short_name', 
                                'label' => 'Zone Short Name', 
                                'rules' => 'trim|required'
                        ), 
                        
          ),  
        'zone/edit' => array(
                        'name' => array(
                                'field' => 'name', 
                                'label' => 'Zone Name', 
                                'rules' => 'trim|required|xss_clean'
                        ), 
                        'short_name' => array(
                                'field' => 'short_name', 
                                'label' => 'Zone Short Name', 
                                'rules' => 'trim|required'
                        ), 
                        
          ),
          
          'member/add' => array(
                        'name' => array(
                                'field' => 'name', 
                                'label' => 'Member Name', 
                                'rules' => 'trim|required|xss_clean'
                        ), 
                        'phone' => array(
                                'field' => 'phone', 
                                'label' => 'Phone Number', 
                                'rules' => 'trim|required'
                        ), 
                        'unit_id' => array(
                                'field' => 'unit_id', 
                                'label' => 'Unit ID', 
                                'rules' => 'trim|required'
                        ),
                        'blood_group' => array(
                                'field' => 'blood_group',
                                'label' => 'Blood Group',
                                'rules' => 'required',
                        ),
          ),
        
         

          'user/edit' => array(
                            'name' => array(
                                    'field' => 'name', 
                                    'label' => 'Name', 
                                    'rules' => 'trim|required|xss_clean'
                            ), 
			          		'telephone' => array(
			          				'field' => 'telephone',
			          				'label' => 'Telephone',
			          				'rules' => 'trim|required|bangladeshi_telephone|callback__unique_telephone|xss_clean'
			          		),
			          		'address' => array(
			          				'field' => 'address',
			          				'label' => 'Address',
			          				'rules' => 'trim|xss_clean'
			          		),
                            'email' => array(
                                    'field' => 'email', 
                                    'label' => 'Email', 
                                    'rules' => 'trim|valid_email|xss_clean'
                            ), 
                            'password' => array(
                                    'field' => 'password', 
                                    'label' => 'Password', 
                                    'rules' => 'trim|required|matches[password_confirm]'
                            ),
                            'password_confirm' => array(
                                    'field' => 'password_confirm', 
                                    'label' => 'Confirm password', 
                                    'rules' => 'trim|required|matches[password]'
                            ),
              ),
    
    
        
    //last array element    
    );