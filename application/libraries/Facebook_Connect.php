<?php
include (APPPATH.'libraries/facebook_sdk/facebook.php');
class Facebook_Connect extends Facebook{
    public $user = NULL;
    public $user_id = NULL; 
    public $fb = false;
    public $fbSession = false;
    public $appKey = 0;

    public function __construct() {
        $ci =& get_instance(); //super global object
        $ci->config->load('facebook_config', TRUE);
        $config = $ci->config->item('facebook_config');      

        parent::__construct($config); //initiate Facebook class

        $this->user_id = $this->getUser();
        $me = NULL;
        if($this->user_id){
            try{
                $me = $this->api('/me');
                $this->user = $me;

           } catch (FacebookApiException $e) {
               error_log($e);
           }
       }
    }

    
}