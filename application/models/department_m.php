<?php
class Department_M extends MY_Model{
    public $_table_name = 'department';
    public $_primary_key = 'department_id';
    protected $_order_by = 'name';
            
    function __construct() {
        parent::__construct();
        
    }
    
    function get_new(){
        $department = new stdClass();
        $department->name = '';       
        $department->short_name = '';
        $department->name_in_bangla = '';
        return $department;
    }
    
    function get_all_departments(){
       
        //this func returns all district name in a array
        //array([1]=> 'Borguna', [2]=>'Barisal' ......)
        
        $departments = $this->get();
        
        foreach ($departments as $department){
            $departments_array[$department->id] = $department->name;
        }
        
        return $departments_array;      
    
    }
}