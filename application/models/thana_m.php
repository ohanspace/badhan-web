<?php
class Thana_M extends MY_Model{
    public $_table_name = 'thana';
    public $_primary_key = 'thana_id';
    protected $_order_by = 'district_id';
            
    function __construct() {
        parent::__construct();
        
    }
    
    function get_new(){
        $thana = new stdClass();
        $thana->name = '';
        $thana->name_in_bangla ='';
        $thana->short_name = '';
        $thana->district_id = '';       
        $thana->geolocation_id = NULL;
        return $thana;
    }
    
    public function get_with_district_name ($id = NULL, $single = FALSE)
	{
		$this->db->select('thana.*, district.name as district_name');
		$this->db->join('district', 'thana.district_id = district.district_id', 'left');
                return parent::get($id, $single);
	}
    
}