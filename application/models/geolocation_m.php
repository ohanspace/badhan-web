<?php
class Geolocation_M extends MY_Model{
    protected $_table_name = 'geolocation';
    public $_primary_key = 'geolocation_id';
    protected $_order_by = 'geolocation_id';
    protected $_created_timestamp = TRUE;
            
    function __construct() {
        parent::__construct();
        
    }
    
    function save($data , $id = NULL){
        if(!$id && (empty($data['latitude']) || empty($data['longitude'])) ){
            return NULL;
        }
        else{
            return parent::save($data, $id);
        }
    }
    /*
     * this method return an array containing latitude & longitude 
     * of a givien geolocation id(from database table)
     * @return empty strings if result is empty
     */
    public function get_latitude_longitude($geolocation_id = NULL){
       if($geolocation_id){ 
        $result =  $this->geolocation_m->get($geolocation_id, TRUE);
       }
       $geolocation = new stdClass();
       if(isset($result) && !empty($result)){
           
           $geolocation->latitude = $result->latitude;
           $geolocation->longitude = $result->longitude;
           
           
       } else {
           $geolocation->latitude = '';
           $geolocation->longitude = '';
       }
       return $geolocation;
       
    }
    
    function get_new(){
        $geolocation = new stdClass();
        $geolocation->latitude = '';
        $geolocation->longitude ='';
        return $geolocation;
    }
    
    
    
}