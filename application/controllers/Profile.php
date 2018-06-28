<?php

class Profile extends Auth_Controller {

    function __construct() {
        parent::__construct();
    }
		
	public function index(){
		
		$user_id = $this->session->userdata('user_id');	
		echo "user_id : $user_id<br>";
	}
	
}
