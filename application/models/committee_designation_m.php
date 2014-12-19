<?php
class Committee_designation_M extends MY_Model
{
	protected $_table_name = 'committee_designation';
	
	function __construct(){
		parent::__construct();
	}
	
	public function get_designations_array($committee_type){
		$query = "SELECT designation_id,name 
				FROM `committee_designation` JOIN designation using(designation_id)
				WHERE committee_type = '{$committee_type}'
				ORDER BY designation.order";
		$designations = $this->db->query($query)->result();
		foreach ($designations as $designation){
			$array[$designation->designation_id] = $designation->name;
		}
		return $array;
		
	}
}