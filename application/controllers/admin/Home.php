<?php

class Home extends Admin_Controller {

    function __construct() {
        parent::__construct();
    }
	
	public function index(){
		
		$data = array();
		$data['css_includes'][] = base_url() . '/assets/admin/css/admin.css?v='.time();
		$data['js_includes'][] = base_url() . '/assets/admin/js/admin.js?v='.time();
		
		$data['css_includes'][] = base_url() . '/assets/admin/css/admin.css?v='.time();
		$data['js_includes'][] = base_url() . '/assets/plugins/charts-c3/js/c3.min.js';
		$data['js_includes'][] = base_url() . '/assets/plugins/charts-c3/js/d3.v3.min.js';
		$data['css_includes'][] = base_url() . '/assets/plugins/charts-c3/plugin.css';
		
		$this->load->view("admin/home/index", $data);
	}	
}
