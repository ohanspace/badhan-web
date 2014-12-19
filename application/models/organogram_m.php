<?php
class Organogram_M extends MY_Model
{
	protected $_table_name = 'organogram';
	protected $_order_by = 'estd';
	protected $_created_timestamp = false;
	protected $_primary_key = 'organogram_id';
	function __construct(){
		parent::__construct();
	}
	
	public function get_zones(){
		
		$zones = $this->get_by(array('organogram_type'=>'ZONE'));
		
		return $zones;
	}
	
	public function get_individual_units(){
		
		$units = $this->get_by(array('organogram_type'=>'UNIT', 
									'parent_id' => 1));		
		return $units;
	}
	
	public function get_familys(){
	
		$familys = $this->get_by(array('organogram_type'=>'FAMILY'));
		return $familys;
	}
	
	public function get_organogram($short_name,$parent_id){
		$organogram = $this->get_by(array('short_name'=>$short_name, 'parent_id' => $parent_id), true);
		return $organogram;
	}
	
	public function get_parent($parent_id =NULL){
		if($parent_id){
			$parent = $this->get($parent_id);
			return $parent;
		}
		return NULL;
	}
	
	public function get_childs($parent_id){
		if($parent_id){
		$childs = $this->get_by(array('parent_id' => $parent_id));
		return $childs;
		}
		return NULL;
	}
	
	public function get_organogram_json(){
		$query = "SELECT t1.* ,t2.name as 'parent_name', t2.short_name as 'parent_short_name', geolocation.*
FROM organogram as t1 LEFT JOIN organogram as t2 on t1.parent_id = t2.organogram_id 
	LEFT JOIN geolocation on t1.geolocation_id = geolocation.geolocation_id;";
		$result = $this->db->query($query)->result_array();
		return json_encode($result);
	}
}