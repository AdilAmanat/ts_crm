<?php

class TW_Email extends CI_Email {

    public function __construct(array $config = array()){
        parent::__construct($config);
     }
	
	public function add_custom_header($header, $content) {
        $this->_set_header($header, $content);
        return $this;
    }

}
