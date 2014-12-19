<?php
class Unit_M extends MY_Model {
	
	public $_table_name = 'unit';
        public $_primary_key = 'unit_id';
        protected $_order_by = 'unit_id';                
        
	
	function __construct() {
		parent::__construct();
	}
           
        public function get_new(){
		$unit = new stdClass();
		$unit->name = '';
		$unit->short_name = '';
                $unit->name_in_bangla = '';                              
		$unit->zone_id = NULL;
                $unit->institution_id = '';
                $unit->office_info_id = NULL;
		return $unit;
	}
        
        public function get_with_institution_and_zone_name ($id = NULL, $single = FALSE)
	{
		$this->db->select('units.*,institutions.short_name as institution_name, zones.short_name as zone_name');
		$this->db->join('institutions', 'units.institution_id = institutions.id', 'left');
                $this->db->join('zones', 'units.zone_id = zones.id', 'left');
		return parent::get($id, $single);
	}
        
        public function get_unit_name($id = NULL){
                if($id){
                    $unit = $this->get($id, TRUE);
                    if($unit){
                        return $unit->name;
                    }
                }
                return 'Not Available';
        }
        public function get_all_unit_name_with_id($zone_id = NULL){
        	if($zone_id){
        		$this->db->where('zone_id' , $zone_id);
        	}
            $units = $this->get();           
            $result = array();
            
            foreach ($units as $key => $unit){
                $result[$unit->unit_id] = $unit->name;
            }
            return $result;
        }
        
        function get_nested(){
            $str = 'SELECT unit.unit_id, unit.short_name as unit_name, unit.zone_id, zone.short_name as zone_name
                    FROM unit LEFT JOIN zone on unit.zone_id = zone.zone_id ORDER BY zone_id';
           $units = $this->db->query($str)->result_array();          
            $array = array();
            foreach ($units as $unit){
                if(!$unit['zone_id'] ){
                    $array['Individual_Units'][] = $unit; 
                }  else {
                    $array[$unit['zone_name']][] = $unit;
                }
            }
            
            return $array;
        }
        
}

