<?php
class Family_M extends MY_Model {
	
	public $_table_name = 'family';
    public $_primary_key = 'family_id';
    protected $_order_by = 'name';                
        
	
	function __construct() {
		parent::__construct();
	}
           
        public function get_new(){
		$family = new stdClass();
		$family->name = '';
		$family->short_name = '';
        $family->name_in_bangla = '';               		
        $family->institution_id = NULL;
        $family->zone_id = NULL;
        $family->office_info_id = NULL;
		return $family;
	}
        
        public function get_with_institution_name ($id = NULL, $single = FALSE)
	{
		$this->db->select('familys.*,institutions.short_name as institution_name');
		$this->db->join('institutions', 'familys.institution_id = institutions.id', 'left');               
		return parent::get($id, $single);
	}
        
        public function get_family_name($id = NULL){
                if($id){
                    $family = $this->get($id, TRUE);
                    if($family){
                        return $family->name;
                    }
                }
                return 'Not Available';
        }
        public function get_all_family_name_with_id(){
            $familys = $this->get();           
            $result = array();
            
            foreach ($familys as $key => $family){
                $result[$family->id] = $family->name.' zone';
            }
            return $result;
        }
        
}

