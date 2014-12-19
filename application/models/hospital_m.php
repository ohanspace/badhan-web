<?php
class Hospital_M extends MY_Model{
    public $_table_name = 'hospital';
    public $_primary_key = 'hospital_id';
    protected $_order_by = 'name';
            
    function __construct() {
        parent::__construct();
        
    }
    
    function get_new(){
        $hospital = new stdClass();
        $hospital->name = '';
        $hospital->name_in_bangla ='';
        $hospital->short_name = '';
        $hospital->type = '';
        $hospital->district_id = '';
        $hospital->address = '';       
        $hospital->geolocation_id = NULL;
        return $hospital;
    }
    
    public function get_with_district_name ($id = NULL, $single = FALSE)
	{
		$this->db->select('hospital.*, district.name as district_name');
		$this->db->join('district', 'hospital.district_id = district.district_id', 'left');
                return parent::get($id, $single);
	}
    /*
     * return all hospitals with id,name,type as properties 
     */
    public function get_all_id_name_type(){
            
            $hospitals['UNIVERSITIES'] = $this->db->select('id,name')->from($this->_table_name)->where('type','UNIVERSITY')->get()->result(); 
            $hospitals['COLLEGES'] = $this->db->select('id,name')->from($this->_table_name)->where('type','COLLEGE')->get()->result();
            if (count($hospitals['UNIVERSITIES']) OR count($hospitals['COLLEGES'])){
                return $hospitals;
            }else{
                //no hospital in DB
                return FALSE;
            }
        }
}