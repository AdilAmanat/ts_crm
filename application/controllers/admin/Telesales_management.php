<?php

class Telesales_management extends Admin_Controller {

    function __construct() {
        parent::__construct();
        //$this->output->enable_profiler(TRUE);
    }

    public function index() {
		
        $data = array();
		$data['js_includes'][] = '/assets/admin/js/users_home.js';
		$this->load->model("telesales_management_model");
		$filters = $this->input->get();
		$data["filters"] = $filters;
		$data["dropdowns"] = $this->telesales_management_model->get_dropdowns_telesales();
        $this->load->view('admin/telesales_management/index', $data);
    }

}
