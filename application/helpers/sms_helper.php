<?php

/*
 * this helper function contains all functionality
 * for SMS Gateway Service
 */


//Define the PlanetIt SMS Gateway Credentials
define('PLANET_USERNAME', 'badhan');
define('PLANET_PASSWORD','Hellobd23');

/*
 * check_balance function shows current sms credit balance
 * 
 */
function check_balance(){
    $url = 'http://app.planetgroupbd.com/api/command' ;
    $fields = array(
        'username' => PLANET_USERNAME,
        'password' => PLANET_PASSWORD,
        'cmd' => 'Credits'
    );
    
     //Execute the http request to communicate with Planet Server
     $result = execute_http_curl_request($url,$fields);
    
    if(!$result){
        echo 'Curl Execution Faild! '
        . 'Couldnt connect to the PlanetIT server';
        
        return FALSE;
    }  else {
        //return the credit balance in integer form
      return intval($result);  
    }
    
    

}


//incomplete!!
function check_delivery_report($messageid = NULL){
    $url = 'http://app.planetgroupbd.com/api/v3/dr/pull';
    $fields = array(
        'user' => PLANET_USERNAME,
        'password' => PLANET_PASSWORD,
    );
    if($messageid){
        $fields['messageid'] = $messageid;
    }
    
    $fields_string = http_build_query($fields);
    
     //create a curl handler
    $ch = curl_init(); 
    //setup curl
    curl_setopt($ch, CURLOPT_URL , $url);
    curl_setopt($ch, CURLOPT_POST, count($fields));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 0);
    
    //execute the curl
    $result = curl_exec($ch);
    if(!$result){
        echo 'Curl Execution Faild! '
        . 'Couldnt connect to the PlanetIT server';
        
        return FALSE;
    }
    
    //close the curl handler
    curl_close($ch);
}


/*
 * send an instant message
 * @param $GSM : ''
 * @param $SMSText : ''
 * @param $validate_telephone : FALSE
 * @param $sender : 'BADHAN'
 * @param $sms_type 'short_SMS'
 * 
 * @reurn on successful send return messageid string
 */
function send_instant_sms($GSM = '', $SMSText = '',$validate_telephone = FALSE,$sender='BADHAN', $sms_type = 'short_SMS'){
    
    //first check the balance
    if(check_balance()<=0){
        echo 'No balance in Planet Account'
        . 'inform Admin to renew credit balance';
        return FALSE;
    }
    
    
    //check the provided telephone number
    if(!isset($GSM)){
        echo 'recipients Phone number required';
        return FALSE;
    }
    else {
        if($validate_telephone == TRUE){
            if(!_valid_telephone($GSM)){
            return FALSE; 
            }
        }
        
    }
    
    
    //SMS type validation
    if($SMSText == ''){
        echo 'SMS Text required';
        return FALSE;
    }
    if($sms_type == 'short_SMS'){
        $url = 'http://app.planetgroupbd.com/api/sendsms/plain';
    }
    elseif ($sms_type == 'long_SMS') {
        $url = 'http://app.planetgroupbd.com/api/v3/sendsms/plain';
    }
    else {
        echo 'Invalid  SMS Type';
        return FALSE;
    }
    
    
    //Query String Generation  
    $fields = array(
        'user' => PLANET_USERNAME,
        'password' => PLANET_PASSWORD,
        'sender' => $sender,
        'SMSText' => $SMSText,
        'GSM' => '88'.$GSM
    );
    
    //Execute the http request to communicate with Planet Server
   $result = execute_http_curl_request($url,$fields);
    
    if(!$result){
        echo 'Curl Execution Faild! '
        . 'Couldnt connect to the PlanetIT server';     
        return FALSE;
    } else {
        return $result;  
    }
    
    
}


function execute_http_curl_request($url='',$fields){
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
            
            return $result;
    
    }
}



/*
* this callback function 
* returns TRUE if given telephone is 11 digit Bangladeshi valid mobile number
* ELSE return false
*/
        
function _valid_telephone($telephone){
        
        $pattern = '/^[0][1](1|5|6|7|8|9)\d{8}$/';
        
        if(preg_match($pattern, $telephone)==1){
            return TRUE;
        }
        else {
            echo 'Invalid bangladeshi mobile number';
            return FALSE;         
        }
    }