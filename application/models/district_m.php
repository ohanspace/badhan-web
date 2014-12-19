<?php
class District_M extends MY_Model{
    public $_table_name = 'district';
    public $_primary_key = 'district_id';
    protected $_order_by = 'district_id';
            
    function __construct() {
        parent::__construct();
        
    }
    
    function get_new(){
        $district = new stdClass();
        $district->name = '';
        $district->name_in_bangla ='';
        $district->division_name = '';
        $district->geolocation_id = NULL;
        return $district;
    }
    
    function get_all_id_name(){
        $this->db->select("$this->_primary_key, name");
        $this->db->order_by('name');
        $districts = $this->get();
        
        if(count($districts)){
            return $districts;
        }
        else {
            return FALSE;
        }
    }
}