<?php
class Zone_M extends MY_Model {
	
	public $_table_name = 'zone';
        public $_primary_key = 'zone_id';
        protected $_order_by = 'zone_id';                
        
	
	function __construct() {
		parent::__construct();
	}
           
        public function get_new(){
		$zone = new stdClass();
		$zone->name = '';
		$zone->short_name = '';
                $zone->name_in_bangla = '';
                $zone->office_info_id = NULL;              
		return $zone;
	}
        
//        public function get_zone_name($id = NULL){
//                if($id){
//                    $zone = $this->get($id, TRUE);
//                    return $zone->short_name;
//                }
//                return 'Individual Unit';
//        }
        
        public function get_all_id_name(){
            $this->db->select("$this->_primary_key, name");
            $zones = $this->get() ;          
            if(count($zones)){
                return $zones;
            }
            else {
                return FALSE;
            }
        }
        
        public function get_nested(){
            
        }
        
        /*
         *  array(
         *  'buet-zone' => 'bangladesh university ....',
         *  'du-zone => 
         *  )
         */
        public function get_zones_short_name_with_name(){
        
        	$zones = $this->get();
        	foreach ($zones as $zone){
        		$array[strtolower($zone->short_name)] = $zone->name; 
        	}
        	return $array;
        }
        
}

