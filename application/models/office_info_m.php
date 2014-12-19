<?php
class Office_info_M extends MY_Model{
    public $_table_name = 'office_info';
    public $_primary_key = 'office_info_id';
    protected $_order_by = 'office_info_id';
            
    function __construct() {
        parent::__construct();
        
    }
   
    
    function get_new(){
        $office_info = new stdClass();
        $office_info->geolocation_id = NULL;
        $office_info->address = '';
        $office_info->address2 = '';
        $office_info->estd = '1997-10-23';
        $office_info->telephone = '';
        $office_info->telephone2 = '';
        $office_info->telephone3 = '';
        $office_info->email = '';
        $office_info->office_open_time = '18:00';
        $office_info->office_close_time = '21:00';
        $office_info->fb_page_link = '';
        $office_info->fb_group_link = '';
        return $office_info;
    }
    
    
    
}