<?php

class Manage_status extends Admin_Controller {

    function __construct() {
        parent::__construct();
        //$this->output->enable_profiler(TRUE);
    }

    public function index() {
		//echo "1";exit;
        $data = array();
		$data['css_includes'][] = '/assets/admin/css/admin.css';
		
		$this->load->model("generic_model");
		$data["status"] = $this->generic_model->get_all_tsa_status();
        $this->load->view('admin/manage_status/index', $data);
    }
	
	public function add() {
		//return;
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->load->model("generic_model");
        $data = array();
		$data['js_includes'][] = '/assets/admin/js/manage_status.js';
		$data['js_includes'][] = '/assets/js/vendors/colorpicker.js';
		$data['css_includes'][] = '/assets/css/colorpicker.css';
		$data['css_includes'][] = '/assets/admin/css/admin.css';
		
		
		if($this->input->post()){
			$this->form_validation->set_rules('status', 'Status', 'trim|required|min_length[1]');
		}
        if ($this->form_validation->run() == FALSE) {
			$data["mode"] = "Add";
            $this->load->view('admin/manage_status/add', $data);
        } else {
			$data = $this->input->post();
			//echo "<pre>"; print_r($data); echo "</pre>";exit;
			unset($data["add_tsa_status_submit"]);
			$this->generic_model->add_tsa_status($data);			
			$this->session->set_flashdata('success_msg', 'Staus '.$data["status"].' has been added!');
			redirect("/admin/manage-status/");			
		}
        
    }
	
	public function edit($id) {
		//return;
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->load->model("generic_model");
        $data = array();
		$data['js_includes'][] = '/assets/admin/js/manage_status.js';
		$data['js_includes'][] = '/assets/js/vendors/colorpicker.js';
		$data['css_includes'][] = '/assets/css/colorpicker.css';
		
		
		if($this->input->post()){
			$this->form_validation->set_rules('status', 'Status', 'trim|required|min_length[1]');
		}
        if ($this->form_validation->run() == FALSE) {
			$data["mode"] = "Edit";
			$data["status"] = $this->generic_model->get_tsa_status($id);
            $this->load->view('admin/manage_status/add', $data);
        } else {
			$data = $this->input->post();
			unset($data["add_tsa_status_submit"]);
			$this->generic_model->edit_tsa_status($data, $id);			
			$this->session->set_flashdata('success_msg', 'Status '.$data["status"].' has been updated!');
			redirect("/admin/manage-status/");			
		}
        
    }

}
