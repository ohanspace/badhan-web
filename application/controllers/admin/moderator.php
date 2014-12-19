<?php
class Moderator extends Admin_Controller
{
	function __construct(){
		parent::__construct();
	}
	
	public function index(){
		
		$this->data['organogram'] = $this->organogram_m->get_nested();
		$this->data['moderator_view_link'] = site_url('admin/moderator/view/');
		
		
		$this->data['subview'] = 'admin/moderator/index';
		$this->load->view('admin/_layout_main',$this->data);
	}
	
	public function view($param1  = NULL, $param2 = NULL){
		//organogram_type | organogram_id
		$param1 = strtolower($param1);
		$param2 = strtolower($param2);
		
		if($param1 && !$param2){
			if($param1 == 'central')
			{
				$organogram_type = 'central';
				$organogram_id = NULL;
			}elseif (preg_match('/^.*zone$/', $param1))
			{
				$organogram_type = 'zone';
				$organogram_id = $param1;
			}
			
			dump($organogram_type);
			
		}
	}
	
}