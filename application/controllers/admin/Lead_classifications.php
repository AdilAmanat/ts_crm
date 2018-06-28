<?php

class Lead_classifications extends Admin_Controller {

    function __construct() {
        parent::__construct();
        //$this->output->enable_profiler(TRUE);
    }

    public function index() {
		//echo "1";exit;
        $data = array();
		
		$this->load->model("generic_model");
		$data["classifications"] = $this->generic_model->get_all_lead_classifications();
        $this->load->view('admin/lead_classifications/index', $data);
    }
	
	public function add() {
		//return;
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->load->model("generic_model");
        $data = array();
		$data['js_includes'][] = '/assets/admin/js/lead_classifications.js';
		
		
		if($this->input->post()){
			$this->form_validation->set_rules('classification', 'Classification', 'trim|required|min_length[1]');
		}
        if ($this->form_validation->run() == FALSE) {
			$data["mode"] = "Add";
            $this->load->view('admin/lead_classifications/add', $data);
        } else {
			$data = $this->input->post();
			//echo "<pre>"; print_r($data); echo "</pre>";exit;
			unset($data["add_lead_classification_submit"]);
			$this->generic_model->add_lead_classification($data);			
			$this->session->set_flashdata('success_msg', 'Lead Classification '.$data["classification"].' has been added!');
			redirect("/admin/lead-classifications/");			
		}
        
    }
	
	public function edit($id) {
		//return;
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->load->model("generic_model");
        $data = array();
		$data['js_includes'][] = '/assets/admin/js/lead_classifications.js';
		
		
		if($this->input->post()){
			$this->form_validation->set_rules('classification', 'Classification', 'trim|required|min_length[1]');
		}
        if ($this->form_validation->run() == FALSE) {
			$data["mode"] = "Edit";
			$data["classifications"] = $this->generic_model->get_lead_classification($id);
            $this->load->view('admin/lead_classifications/add', $data);
        } else {
			$data = $this->input->post();
			unset($data["add_lead_classification_submit"]);
			$this->generic_model->edit_lead_classification($data, $id);			
			$this->session->set_flashdata('success_msg', 'Lead Classification '.$data["classification"].' has been updated!');
			redirect("/admin/lead-classifications/");			
		}
        
    }

}
