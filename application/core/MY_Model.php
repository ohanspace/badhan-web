<?php

/*
 * This class effectively helps to common interation with a database table
 */
class MY_Model extends CI_Model {
	
    protected $_table_name = '';
	protected $_primary_key = 'id';
	protected $_primary_filter = 'intval';
	protected $_order_by = '';          
	protected $_created_timestamp = FALSE;
    public $rules = array();
	
	function __construct() {
		parent::__construct();
	}
        
        public function array_from_post($fields){
		$data = array();
		foreach ($fields as $field) {
			$data[$field] = $this->input->post($field);
		}
		return $data;
	}
        
        
	/*
         *  get() allows to get record(s) with or without a primary key value
         */
	public function get($id = NULL, $single = FALSE){
		
		if ($id != NULL) {
			$filter = $this->_primary_filter;
			$id = $filter($id);
			$this->db->where($this->_primary_key, $id);
			$method = 'row';
		}
		elseif($single == TRUE) {
			$method = 'row';
		}
		else {
			$method = 'result';
		}
		
		if (!count($this->db->ar_orderby)) {
			$this->db->order_by($this->_order_by);
		}
		return $this->db->get($this->_table_name)->$method();
	}
        
	/*
         * get_by() allows filter record with multiple column values
         * example:
         *  $pages = $this->page_m->get_by(array('slug'=>'about', 'order'=> 2));
         */
	public function get_by($where, $single = FALSE){
		$this->db->where($where);
		return $this->get(NULL, $single);
	}
	
        /*
         * save() allows to insert/update data
         */
	public function save($data, $id = NULL){
		$now = date('Y-m-d H:i:s');
		// Set new row created timestamp if available in table field
		if ($this->_created_timestamp == TRUE && !$id) {
			
                           $data['created'] = $now; 
                       
		}
                //everytime when effected a row set the modified datetime
                $data['modified'] = $now;
		
		// Insert
		if ($id === NULL) {
                    if(!isset($data[$this->_primary_key])){
                         $data[$this->_primary_key] = NULL;
                    }
                    $this->db->set($data);
                    $this->db->insert($this->_table_name);
                    $id = $this->db->insert_id();
		}
		// Update
		else {
                    $filter = $this->_primary_filter;
                    $id = $filter($id);
                    $this->db->set($data);
                    $this->db->where($this->_primary_key, $id);
                    $this->db->update($this->_table_name);
		}
		
		return $id;
	}
	
        /*
         * delete() 
         */
	public function delete($id){
		$filter = $this->_primary_filter;
		$id = $filter($id);
		
		if (!$id) {
			return FALSE;
		}
		$this->db->where($this->_primary_key, $id);
		$this->db->limit(1);
		$this->db->delete($this->_table_name);
	}
}