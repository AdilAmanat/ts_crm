<?php

class Handset_models extends Admin_Controller {

    function __construct() {
        parent::__construct();
        //$this->output->enable_profiler(TRUE);
    }

    public function index() {
		//echo "1";exit;
        $data = array();
		
		$this->load->model("generic_model");
		$data["handsets"] = $this->generic_model->get_all_handset_models();
        $this->load->view('admin/handset_models/index', $data);
    }
	
	public function add() {
		//return;
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->load->model("generic_model");
        $data = array();
		$data['js_includes'][] = '/assets/admin/js/handset_models.js';
		
		
		if($this->input->post()){
			$this->form_validation->set_rules('name', 'name', 'trim|required|min_length[1]');
		}
        if ($this->form_validation->run() == FALSE) {
			$data["mode"] = "Add";
            $this->load->view('admin/handset_models/add', $data);
        } else {
			$data = $this->input->post();
			//echo "<pre>"; print_r($data); echo "</pre>";exit;
			unset($data["add_handset_model_submit"]);
			$this->generic_model->add_handset_model($data);			
			$this->session->set_flashdata('success_msg', 'Handset Model '.$data["status"].' has been added!');
			redirect("/admin/handset-models/");			
		}
        
    }
	
	public function edit($id) {
		//return;
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->load->model("generic_model");
        $data = array();
		$data['js_includes'][] = '/assets/admin/js/handset_models.js';
		
		
		if($this->input->post()){
			$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[1]');
		}
        if ($this->form_validation->run() == FALSE) {
			$data["mode"] = "Edit";
			$data["handsets"] = $this->generic_model->get_handset_model($id);
            $this->load->view('admin/handset_models/add', $data);
        } else {
			$data = $this->input->post();
			unset($data["add_handset_model_submit"]);
			$this->generic_model->edit_handset_model($data, $id);			
			$this->session->set_flashdata('success_msg', 'Handset Model '.$data["status"].' has been updated!');
			redirect("/admin/handset-models/");			
		}
        
    }

}
