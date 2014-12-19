<?php
class Query extends Admin_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->library('sms');
	}
	
	public function index(){
		$this->data['sms_balance'] = $this->sms->check_balance();
		
		$this->data['subview'] = 'admin/query/index';
		$this->load->view('admin/_layout_main', $this->data);
	}
}