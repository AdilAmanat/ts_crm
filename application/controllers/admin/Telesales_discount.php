<?php

class Telesales_discount extends Admin_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = array();
		$data['css_includes'][] = '/assets/admin/css/admin.css';
		
		$this->load->model("generic_model");
		$data["yes_no_array"] = array('No', 'Yes');
		$data["telesales_discount"] = $this->generic_model->get_telesales_discount();
        $this->load->view('admin/telesales_discount/index', $data);
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
			$this->form_validation->set_rules('discount', 'Discount', 'trim|required');
		}
        if ($this->form_validation->run() == FALSE) {
			$data["mode"] = "Add";
			$data["yes_no_array"] = array('No', 'Yes');
            $this->load->view('admin/telesales_discount/add', $data);
        } else {
			$data = $this->input->post();
			$this->generic_model->add_telesales_discount($data);			
			$this->session->set_flashdata('success_msg', 'Discount '.$data["discount"].' has been added!');
			redirect("/admin/telesales-discount/");
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
			$this->form_validation->set_rules('discount', 'Discount', 'trim|required');
		}
        if ($this->form_validation->run() == FALSE) {
			$data["mode"] = "Edit";
			$data["id"] = $id;
			$data["discount"] = current($this->generic_model->get_telesales_discount($id));
			$data["yes_no_array"] = array('No', 'Yes');
            $this->load->view('admin/telesales_discount/add', $data);
        } else {
			$data = $this->input->post();
			$this->generic_model->edit_telesales_discount($data, $id);			
			$this->session->set_flashdata('success_msg', 'Discount '.$data["discount"].' has been updated!');
			redirect("/admin/telesales-discount/");
		}
        
    }

}
