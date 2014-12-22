<?php
class Committee extends MY_Controller
{
	function __construct(){
		parent::__construct();
		
	}
	

	public function index($organogram_id){
		if (is_numeric($organogram_id)) {
			$organogram = $this->data['organogram'] = $this->organogram_m->get($organogram_id,true);
		}else {
			exit();
		}
		
		$this->data['organogram']->existing_committees = 
					$this->committee_m->get_by(array('organogram_id' => $organogram_id));
		$rules = array(
		
				'new_committee_year' => array(
						'field' => 'new_committee_year',
						'label' => 'Committee year',
						'rules' => 'required|exact_length[4]'
				),
		);
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run()){
			$data = array(
				'organogram_id' => $organogram->organogram_id,
				'committee_year' => $this->input->post('new_committee_year'),
				'committee_type' => $organogram->organogram_type,	
			);
			$data['committee_title'] = $organogram->name.' Committee '.$data['committee_year'];
			$new_committee_id = $this->committee_m->save($data);
			redirect('committee/members/'.$new_committee_id.'/'.$data['committee_year']);
		}
		
		$this->data['subview'] = 'committee/index';
		$this->load->view('_main_layout', $this->data);
	}
	
	public function members($committee_id){
		
		$committee = $this->data['committee'] = $this->committee_m->get($committee_id,true);
		$organogram = $this->data['organogram'] = $this->organogram_m->get($committee->organogram_id);
		$this->data['committee_members'] = 
				$this->committee_member_m->get_committee_members($committee_id);
		$this->data['committee_designations'] = 
					$this->committee_designation_m->get_designations_array($committee->committee_type);
		$this->data['new_committee_member'] = 
				$this->committee_member_m->get_new();
		$this->data['institutions'] = 
				$this->institution_m->get_organogram_institution_array($organogram->organogram_id);
		
		$this->form_validation->set_rules($this->committee_member_m->rules);
		if($this->form_validation->run()){
			$new_member_data = $this->committee_member_m->array_from_post(array(
					'name','name_in_bangla','designation_id','blood_group',
					'institution_id','edu_session','edu_level','telephone','email','facebook_url'
			
			));
			$new_member_data['committee_id'] = $committee_id;
			$this->committee_member_m->save($new_member_data,$id);
			$this->session->set_flashdata('saved_notification','modification complete!');
			
			header('Location:'.$_SERVER['HTTP_REFERER']);
		}
		
		$this->data['subview'] = 'committee/members';
		$this->load->view('_main_layout', $this->data);
	}
	
	public function edit_member($id){
		if($id){
			$member = $this->data['committee_member'] = $this->committee_member_m->get($id,TRUE);
			$committee = $this->data['committee'] = $this->committee_m->get($member->committee_id);
			$this->data['organogram'] = $this->organogram_m->get($committee->organogram_id);
			
			$this->data['institutions'] =
				$this->institution_m->get_organogram_institution_array($committee->organogram_id);
			$this->data['committee_designations'] =
				$this->committee_designation_m->get_designations_array($committee->committee_type);
			
		}
		 
		$this->form_validation->set_rules($this->central_committee_m->rules);
		if($this->form_validation->run()){
			$member_data = $this->central_committee_m->array_from_post(array(
					'name','name_in_bangla','designation_id','blood_group',
					'institution_id','edu_session','edu_level','telephone','email','facebook_url'
		
			));
			$this->committee_member_m->save($member_data,$id);
			$this->session->set_flashdata('saved_notification','modification complete!');
		
			header('Location:'.$_SERVER['HTTP_REFERER']);
		}
		 
		
		$this->data['subview'] = 'committee/edit_member';
		$this->load->view('_main_layout', $this->data);
		
	}
	
	public function delete_member($id){
		if($id){
			$this->committee_member_m->delete($id);
		}
		header('Location:'.$_SERVER['HTTP_REFERER']);
	}
}
