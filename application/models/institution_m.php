<?php
class Institution_M extends MY_Model{
    public $_table_name = 'institution';
    public $_primary_key = 'institution_id';
    protected $_order_by = 'name';
            
    function __construct() {
        parent::__construct();
        
    }
    
    function get_organogram_institution_array($organogram_id){
    	$organogram = $this->organogram_m->get($organogram_id);
    	if(empty($organogram->institution_id)){
    		$query = "SELECT DISTINCT organogram.institution_id, institution.name
						FROM organogram JOIN institution USING(institution_id)
						WHERE organogram.parent_id = {$organogram_id}";
    	}else {
    		$query = "SELECT * FROM institution WHERE institution_id = {$organogram->institution_id}";
    	}
    	
    	$institutions = $this->db->query($query)->result();
    	
    	foreach ($institutions as $institution){
    		$array[$institution->institution_id] = $institution->name;
    	}
    	
    	return $array;
    	
    	
    }
    
    function get_new(){
        $institution = new stdClass();
        $institution->name = '';
        $institution->name_in_bangla ='';
        $institution->short_name = '';
        $institution->type = '';
        $institution->district_id = '';
        $institution->address = '';       
        $institution->geolocation_id = NULL;
        return $institution;
    }
    
    public function get_with_district_name ($id = NULL, $single = FALSE)
	{
		$this->db->select('institution.*, district.name as district_name');
		$this->db->join('district', 'institution.district_id = district.district_id', 'left');
                return parent::get($id, $single);
	}
    /*
     * return all institutions with id,name,type as properties 
     */
    public function get_all_id_name_type(){
            
            //$institutions['UNIVERSITIES'] = $this->db->select('institution_id,name')->from($this->_table_name)->where('type','UNIVERSITY')->get()->result(); 
            //$institutions['COLLEGES'] = $this->db->select('institution_id,name')->from($this->_table_name)->where('type','COLLEGE')->get()->result();
            
            $this->db->select("$this->_primary_key, name");
            $institutions['UNIVERSITIES'] = $this->get_by(array('type'=>'UNIVERSITY'));
            $this->db->select("$this->_primary_key, name");
            $institutions['COLLEGES'] = $this->get_by(array('type'=>'COLLEGE'));
            $this->db->select("$this->_primary_key, name");
            $institutions['UNIVERSITYCOLLEGES'] = $this->get_by(array('type'=>'BOTH'));           
            if (count($institutions['UNIVERSITIES']) 
                    OR count($institutions['COLLEGES']  
                            OR count($institutions['UNIVERSITYCOLLEGES']))){                
                return $institutions;
            }else{
                //no institution in DB
                return FALSE;
            }
        }
        
       /*
        * get institution array where badhan units/family are in operation
        */
        public function get_operate_institutions_array(){
        	$query = "SELECT name,institution_id 
        			FROM {$this->_table_name} 
					WHERE institution_id in (SELECT unit.institution_id FROM unit UNION SELECT family.institution_id FROM family)
					ORDER BY institution.name";
        	$institutions = $this->db->query($query)->result();
        	
        	foreach ($institutions as $institution){
        		$array[$institution->institution_id] = $institution->name;
        	}
        	return $array;
        }
}