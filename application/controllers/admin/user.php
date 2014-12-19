<?php
class User extends Admin_Controller {

    public function __construct(){
        parent::__construct();       
    }
    
    public function index ()
	{
		$this->data['users'] = $this->admin_m->get();
		$this->data['subview'] = 'admin/user/index';
		$this->load->view('admin/_layout_main', $this->data);
	}

    public function edit ($id = NULL)
	{
		// Fetch a user or set a new one
		if ($id) {
			$this->data['user'] = $this->admin_m->get($id);
			count($this->data['user']) || $this->data['errors'][] = 'User could not be found';
		}
		else {
			$this->data['user'] = $this->admin_m->get_new();
		}
		
		// Set up the form               
		$rules = $this->config->item('user/edit');                
		$id || $rules['password']['rules'] .= '|required';
		$this->form_validation->set_rules($rules);
		
		// Process the form
		if ($this->form_validation->run() == TRUE) {
			$data = $this->admin_m->array_from_post(array('name','telephone','address', 'email', 'password'));
			$data['password'] = $this->admin_m->hash($data['password']);
			$this->admin_m->save($data, $id);
			redirect('admin/user');
		}
		
		// Load the view
		$this->data['subview'] = 'admin/user/edit';
		$this->load->view('admin/_layout_main', $this->data);
	}

    public function delete ($id)
	{
		$this->admin_m->delete($id);
		redirect('admin/user');
	}


    public function login(){
    	
    	$dashboard = 'admin/dashboard';
        if($this->admin_m->loggedin() == TRUE){
            redirect($dashboard);
        }
        
        $rules = array(
                'telephone' => array(
                    'field'=> 'telephone', 
                    'label' => 'Telephone', 
                    'rules'=> 'trim|required'
                    ),
                'password' => array(
                    'field'=> 'password', 
                    'label' => 'Password', 
                    'rules'=> 'trim|required'
                    ),
             );
             $this->form_validation->set_rules($rules);
    	
    	if ($this->form_validation->run() == TRUE) {
    		// We can login and redirect
    		if ($this->admin_m->login() == TRUE) {
    			redirect($dashboard);
    		}else {
    			$this->session->set_flashdata('error', 'That email/password combination does not exist');
    			redirect('admin/user/login', 'refresh');
    		}
    	}
        $this->data['subview'] = 'admin/user/login';
        $this->load->view('admin/_layout_modal', $this->data);
    }

    public function logout(){
    	$this->admin_m->logout();
    	redirect('admin/user/login');
    }
    
    //callback function _unique_email()
    public function _unique_telephone ()
	{
		$id = $this->uri->segment(4);
		$this->db->where('telephone', $this->input->post('telephone'));
                if($id){
                   $this->db->where('id !=', $id); 
                }
		
		$user = $this->admin_m->get();
		
		if (count($user)) {
			$this->form_validation->set_message('_unique_telephone', '%s should be unique');
			return FALSE;
		}
		
		return TRUE;
	}
}