<?php

class Package_classifications extends Admin_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = array();
		$data['css_includes'][] = '/assets/admin/css/admin.css';
		
		$this->load->model("generic_model");
		$data["yes_no_array"] = array('No', 'Yes');
		$data["package_classifications"] = $this->generic_model->get_package_classifications();
        $this->load->view('admin/package_classifications/index', $data);
    }
	
	public function add() {
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->load->model("generic_model");
        $data = array();
		$data['js_includes'][] = '/assets/js/vendors/colorpicker.js';
		$data['css_includes'][] = '/assets/css/colorpicker.css';
		$data['css_includes'][] = '/assets/admin/css/admin.css';
		
		
		if($this->input->post()){
			$this->form_validation->set_rules('classifications_name', 'Classifications Name', 'trim|required');
		}
        if ($this->form_validation->run() == FALSE) {
			$data["mode"] = "Add";
			$data["yes_no_array"] = array('No', 'Yes');
            $this->load->view('admin/package_classifications/add', $data);
        } else {
			$data = $this->input->post();
			$this->generic_model->add_package_classifications($data);			
			$this->session->set_flashdata('success_msg', 'Package Classification '.$data["title"].' has been added!');
			redirect("/admin/package-classifications/");
		}
        
    }
	
	public function edit($id) {
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->load->model("generic_model");
        $data = array();
		$data['js_includes'][] = '/assets/js/vendors/colorpicker.js';
		$data['css_includes'][] = '/assets/css/colorpicker.css';
		
		
		if($this->input->post()){
			$this->form_validation->set_rules('classifications_name', 'Classifications Name', 'trim|required');
		}
        if ($this->form_validation->run() == FALSE) {
			$data["mode"] = "Edit";
			$data["id"] = $id;
			$data["package_classification"] = current($this->generic_model->get_package_classifications($id));
			$data["yes_no_array"] = array('No', 'Yes');
            $this->load->view('admin/package_classifications/add', $data);
        } else {
			$data = $this->input->post();
			$this->generic_model->edit_package_classifications($data, $id);			
			$this->session->set_flashdata('success_msg', 'Package Classification '.$data["title"].' has been updated!');
			redirect("/admin/package-classifications/");
		}
        
    }

}
