<?php

class Reports extends Admin_Controller {

    function __construct() {
        parent::__construct();
        //$this->output->enable_profiler(TRUE);
    }

    public function index() {
		
        $data = array();
		//$data['js_includes'][] = '/assets/admin/js/users_home.js';
		$data['css_includes'][] = '/assets/css/jquery-ui.css';
		$data['js_includes'][] = "//code.jquery.com/ui/1.11.4/jquery-ui.min.js";
		$this->load->model("reports_model");
		$filters = $this->input->get();
		$data["filters"] = $filters;
		//$data["users"] = $this->users_model->get_all_users($filters);
		$data["dropdowns"] = $this->reports_model->get_filters_dropdowns();
        $this->load->view('admin/reports/index', $data);
    }

}
