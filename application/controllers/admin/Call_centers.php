<?php

class Call_centers extends Admin_Controller {

    function __construct() {
        parent::__construct();
        //$this->output->enable_profiler(TRUE);
    }

    public function index() {
		//echo "1";exit;
        $data = array();
		
		$this->load->model("generic_model");
		$data["call_centers"] = $this->generic_model->get_all_call_centers();
        $this->load->view('admin/call_centers/index', $data);
    }
	
	public function add() {
		//return;
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->load->model("generic_model");
        $data = array();
		$data['js_includes'][] = '/assets/admin/js/call_centers.js';
		
		
		if($this->input->post()){
			$this->form_validation->set_rules('name', 'name', 'trim|required|min_length[1]');
		}
        if ($this->form_validation->run() == FALSE) {
			$data["mode"] = "Add";
            $this->load->view('admin/call_centers/add', $data);
        } else {
			$data = $this->input->post();
			//echo "<pre>"; print_r($data); echo "</pre>";exit;
			unset($data["add_call_center_submit"]);
			$this->generic_model->add_call_center($data);			
			$this->session->set_flashdata('success_msg', 'Call Center '.$data["name"].' has been added!');
			redirect("/admin/call-centers/");			
		}
        
    }
	
	public function edit($id) {
		//return;
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->load->model("generic_model");
        $data = array();
		$data['js_includes'][] = '/assets/admin/js/call_centers.js';
		
		
		if($this->input->post()){
			$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[1]');
		}
        if ($this->form_validation->run() == FALSE) {
			$data["mode"] = "Edit";
			$data["call_centers"] = $this->generic_model->get_call_center($id);
            $this->load->view('admin/call_centers/add', $data);
        } else {
			$data = $this->input->post();
			unset($data["add_call_center_submit"]);
			$this->generic_model->edit_call_center($data, $id);			
			$this->session->set_flashdata('success_msg', 'Call Center '.$data["name"].' has been updated!');
			redirect("/admin/call-centers/");			
		}
        
    }

}
