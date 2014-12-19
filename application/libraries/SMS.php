<?php

class Sms {
    private $_username;
    private $_password;
    private $_config;
    
    function __construct() {
        $ci =& get_instance(); //super global object
        $ci->config->load('sms_config', TRUE);
        $this->_config = $ci->config->item('sms_config'); 
        $this->_username = $this->_config['username'];
        $this->_password = $this->_config['password'];
       
    }
    
    

    /**
     * check the current SMS credit balance
     *  
     * @return number | couldnt connect to the server
     */
    public function check_balance(){
    	$url = $this->_config['check_balance_url'] ;
    	$fields = array(
    			'username' => $this->_username,
    			'password' => $this->_password,
    			'cmd' => 'Credits'
    	);
    
    	//Execute the http request to communicate with SMS gateway Server
    	$result = $this->_execute_http_curl_request($url,$fields);
    	 
    	return intval($result);
    
    }
    
    
    
    
    /**
     * send an instant message
     * 
     * @param string $GSM 11digit number
     * @param string $SMSText
     * @param string $validate_telephone false
     * @param string $sender 'BADHAN'
     * @param string $sms_type 'short_SMS'
     * @return boolean|mixed
     */
    public function send(
    		$GSM = NULL, //88 will append
    		$SMSText = NULL,
    		$validate_telephone = FALSE,
    		$sender = 'BADHAN',
    		$sms_type = 'short_SMS')
    {
    
    	//first check the balance
    	$balance = $this->check_balance();
    	if(is_numeric($balance) && $balance <= 0){		
    		return 'SMS could not be sent. Error Code: 101';
    	}elseif (!is_numeric($balance)){
    		return $balance;
    	}
    
    
    	//check the provided telephone number
    	if(!isset($GSM)){   		
    		return 'recipients Phone number required';
    	}
    
    	if($validate_telephone == TRUE){
    		if($this->_valid_telephone($GSM) == false){    			
    			return 'Invalid Phone Number';
    		}
    	}
    
    
    	//SMS Text validation
    	if(empty($SMSText)){    		
    		return 'SMS Text required';
    	}
    	//SMS Type
    	if($sms_type == 'short_SMS'){
    		$url = $this->_config['short_sms_url'];
    	}
    	elseif ($sms_type == 'long_SMS') {
    		$url = $this->_config['long_sms_url'];
    	}
    	else {   		
    		return 'Invalid  SMS Type';
    	}
    
    
    	//Query String Generation
    	$fields = array(
    			'user' => $this->_username,
    			'password' => $this->_password,
    			'sender' => $sender,
    			'SMSText' => $SMSText,
    			'GSM' => '88'.$GSM
    	);
    
    	//Execute the http request to communicate with Planet Server
    	$result = $this->_execute_http_curl_request($url,$fields);
    
    	return $result;
    
    
    }
    
    
private function _execute_http_curl_request($url='',$fields){
    if($url !== '' && !empty($fields)){
        
            $fields_string = http_build_query($fields);

            //create and setup a curl handler
            $ch = curl_init(); 

            curl_setopt($ch, CURLOPT_URL , $url);
            curl_setopt($ch, CURLOPT_POST, count($fields));
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
            curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 0);

            //execute the curl
            $result = curl_exec($ch);
            //close the curl handler
            curl_close($ch);
            
            if($result == false){
                return 'Coudnt Connect To the SMS Gateway';
            } else {
                return $result;  
            }
    
    }
}

/**
 * 
 * @param string $telephone
 * @return boolean
 */
        
private function _valid_telephone($telephone){
                     
        if(bangladeshi_telephone($telephone)){
            return TRUE;
        }
        else {           
            return FALSE;         
        }
}
    




}