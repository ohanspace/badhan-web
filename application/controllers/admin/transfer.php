<?php

class Transfer extends Admin_Controller{
    
    function __construct() {
        parent::__construct();
    }
    
    function department(){
        $this->load->model('department_m');
        
        $departments = $this->db->get('departments')->result();
        //dump($departments);
        foreach ($departments as $department){
            $data = array(
                'department_id' => $department->id,
                'name' => $department->name,
                'short_name' => $department->short_name,
            );
            $this->department_m->save($data);
        }
        echo 'successfully transfer';
    }
    
    function district(){
        $this->load->model('district_m');
        $this->load->model('geolocation_m');
        $districts = $this->db->get('districts')->result();
        foreach ($districts as $district){
            
            $geoloc = explode(',', $district->geolocation);
            $data['geolocation'] = array(
                'latitude' => $geoloc[0],
                'longitude' => $geoloc[1],
                'geolocation_id' => $district->id
            );
            $geolocation_id = $this->geolocation_m->save($data['geolocation']);
            //dump($geoloc);
            //dump($data['geolocation']);
            $data['district'] = array(
                'district_id' => $district->id,
                'name' => $district->name,
                'name_in_bangla' => $district->name_in_bangla,
                'division_name' => $district->division_name,
                'geolocation_id' => $geolocation_id
            );
            
            $this->district_m->save($data['district']);
            
        }
        
        echo 'success';
    }
    
    public function institution(){
        $this->load->model('institution_m');
        $this->load->model('geolocation_m');
        $this->load->model('district_m');
        $institutions = $this->db->get('institutions')->result();
        foreach ($institutions as $institution){
            $geolocation_id = NULL;
            if(!empty($institution->geolocation)){
                $geoloc = explode(',', $institution->geolocation);
            
                $data['geolocation'] = array(
                    'latitude' => $geoloc[0],
                    'longitude' => $geoloc[1],                
                );
                $geolocation_id = $this->geolocation_m->save($data['geolocation']);
            }
            
            //dump($geoloc);
            //dump($data['geolocation']);
            $data['institution'] = array(
                'institution_id' => $institution->id,
                'name' => $institution->name,
                'name_in_bangla' => $institution->name_in_bangla,
                'short_name' => $institution->short_name,
                'district_id' => $institution->district_id,
                'type' => $institution->type,
                'address' => $institution->address,
                'geolocation_id' => $geolocation_id
            );
            
            $this->institution_m->save($data['institution']);
            
        }
        
        echo 'success';
    }
    
    public function family(){
        $this->load->model('family_m');
        $this->load->model('office_info_m');
        $this->load->model('geolocation_m');
        
        $families = $this->db->get('familys')->result();
        foreach ($families as $family){
            $geolocation_id = NULL;
            if(!empty($family->geolocation)){
                $geoloc = explode(',', $family->geolocation);
            
                $data['geolocation'] = array(
                    'latitude' => $geoloc[0],
                    'longitude' => $geoloc[1],                
                );
                $geolocation_id = $this->geolocation_m->save($data['geolocation']);
            }
            $data['office_info'] = array(
                'geolocation_id' => $geolocation_id,
                'address' => $family->address,
                'estd' => $family->estd,
                'office_open_time' => '18:00',
                'office_close_time' => '21:00',                            
            );
            $office_info_id = $this->office_info_m->save($data['office_info']);
            
            $data['family'] = array(
                'family_id' => $family->id,
                'name' => $family->name,
                'short_name' => $family->short_name,
                'name_in_bangla' => $family->name_in_bangla,
                'institution_id' => $family->institution_id,
                'office_info_id' => $office_info_id
            );
            $family_id = $this->family_m->save($data['family']);
            dump($family_id);
        }
        
        echo 'success';
    }
    public function zone(){
        $this->load->model('zone_m');
        $this->load->model('office_info_m');
        $this->load->model('geolocation_m');
        
        $zones = $this->db->get('zones')->result();
        foreach ($zones as $zone){
            $geolocation_id = NULL;
            if(!empty($zone->geolocation)){
                $geoloc = explode(',', $zone->geolocation);
            
                $data['geolocation'] = array(
                    'latitude' => $geoloc[0],
                    'longitude' => $geoloc[1],                
                );
                $geolocation_id = $this->geolocation_m->save($data['geolocation']);
            }
            $data['office_info'] = array(
                'geolocation_id' => $geolocation_id,
                'address' => $zone->address,
                'estd' => $zone->estd,
                'office_open_time' => '18:00',
                'office_close_time' => '21:00',
                'fb_page_link' => $zone->fb_page_link,
                'fb_group_link' => $zone->fb_group_link,
            );
            $office_info_id = $this->office_info_m->save($data['office_info']);
            
            $data['zone'] = array(
                'zone_id' => $zone->id,
                'name' => $zone->name,
                'short_name' => $zone->short_name,
                'name_in_bangla' => $zone->name_in_bangla,                
                'office_info_id' => $office_info_id
            );
            $zone_id = $this->zone_m->save($data['zone']);
            dump($zone_id);
        }
        
        echo 'success';
    }
    
    public function unit(){
        $this->load->model('unit_m');
        $this->load->model('office_info_m');
        $this->load->model('geolocation_m');
        
        $units = $this->db->get('units')->result();
        foreach ($units as $unit){
            $geolocation_id = NULL;
            if(!empty($unit->geolocation)){
                $geoloc = explode(',', $unit->geolocation);
            
                $data['geolocation'] = array(
                    'latitude' => $geoloc[0],
                    'longitude' => $geoloc[1],                
                );
                $geolocation_id = $this->geolocation_m->save($data['geolocation']);
            }
            $data['office_info'] = array(
                'geolocation_id' => $geolocation_id,
                'address' => $unit->address,
                'estd' => $unit->estd,
                'office_open_time' => '18:00',
                'office_close_time' => '21:00',                
            );
            $office_info_id = $this->office_info_m->save($data['office_info']);
            if(!$unit->zone_id){
                $zone_id = NULL;
            }else{
                $zone_id = $unit->zone_id;
            }
            
            $data['unit'] = array(
                'unit_id' => $unit->id,
                'name' => $unit->name,
                'short_name' => $unit->short_name,
                'name_in_bangla' => $unit->name_in_bangla,
                'institution_id' => $unit->institution_id,
                'office_info_id' => $office_info_id,
                'zone_id' => $zone_id
            );
            $unit_id = $this->unit_m->save($data['unit']);
            dump($unit_id);
        }
        
        echo 'success';
    }
    
}