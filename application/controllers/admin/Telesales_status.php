<?php
class Telesales_status extends Admin_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = array();
		$data['css_includes'][] = '/assets/admin/css/admin.css';
		
		$this->load->model("generic_model");
		$data["yes_no_array"] = array('No', 'Yes');
		$data["status"] = $this->generic_model->get_telesales_status(0);
        $this->load->view('admin/telesales_status/index', $data);
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
			$this->form_validation->set_rules('status', 'Status', 'trim|required|min_length[1]');
		}
        if ($this->form_validation->run() == FALSE) {
			$data["mode"] = "Add";
			$data["yes_no_array"] = array('No', 'Yes');
            $this->load->view('admin/telesales_status/add', $data);
        } else {
			$data = $this->input->post();
			unset($data["add_tsa_status_submit"]);
			$this->generic_model->add_telesales_status($data);			
			$this->session->set_flashdata('success_msg', 'Staus '.$data["status"].' has been added!');
			redirect("/admin/telesales-status");			
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
			$this->form_validation->set_rules('status', 'Status', 'trim|required|min_length[1]');
		}
        if ($this->form_validation->run() == FALSE) {
			$data["mode"] = "Edit";
			$data["id"] = $id;
			$data["status"] = current($this->generic_model->get_telesales_status($id));
			$data["yes_no_array"] = array('No', 'Yes');
            $this->load->view('admin/telesales_status/add', $data);
        } else {
			$data = $this->input->post();
			unset($data["add_tsa_status_submit"]);
			$this->generic_model->edit_telesales_status($data, $id);			
			$this->session->set_flashdata('success_msg', 'Status '.$data["status"].' has been updated!');
			redirect("/admin/telesales-status");			
		}
        
    }

}
