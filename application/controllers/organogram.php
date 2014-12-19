<?php
class Organogram extends Frontend_Controller
{
	
	function __construct(){
		parent::__construct();
		
		
	}
	
	public function index($param1 = NULL,$param2 = NULL){
		
		
		
		if($param1 && $param2){
			$parent = $this->data['parent'] = $this->organogram_m->get_organogram($param1, 1);
			$organogram = $this->data['organogram'] = $this->organogram_m->get_organogram($param2, $parent->organogram_id);
		}
		elseif($param1 && !$param2){
			$parent = $this->data['parent'] = $this->organogram_m->get_organogram('central', 0);
			$organogram= $this->data['organogram'] = $this->organogram_m->get_organogram($param1, 1);
			if($organogram->organogram_type == 'ZONE'){
				$childs = $this->data['childs'] = $this->organogram_m->get_childs($organogram->organogram_id);
			}	
		}
		
		if($organogram->institution_id){
			$this->data['institution'] = $this->institution_m->get($organogram->institution_id, TRUE);
		}
		
		
		$this->data['subview'] = 'organogram/index';
		$this->load->view('_main_layout',$this->data);
	}
	
	
}