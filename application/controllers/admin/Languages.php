<?php

class Languages extends Admin_Controller {

    function __construct() {
        parent::__construct();
        //$this->output->enable_profiler(TRUE);
    }

    public function index() {
		//echo "1";exit;
        $data = array();
		
		$this->load->model("generic_model");
		$data["languages"] = $this->generic_model->get_all_languages();
        $this->load->view('admin/languages/index', $data);
    }
	
	public function add() {
		//return;
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->load->model("generic_model");
        $data = array();
		$data['js_includes'][] = '/assets/admin/js/languages.js';
		
		
		if($this->input->post()){
			$this->form_validation->set_rules('name', 'name', 'trim|required|min_length[1]');
		}
        if ($this->form_validation->run() == FALSE) {
			$data["mode"] = "Add";
            $this->load->view('admin/languages/add', $data);
        } else {
			$data = $this->input->post();
			//echo "<pre>"; print_r($data); echo "</pre>";exit;
			unset($data["add_language_submit"]);
			$this->generic_model->add_language($data);			
			$this->session->set_flashdata('success_msg', 'Language '.$data["name"].' has been added!');
			redirect("/admin/languages/");			
		}
        
    }
	
	public function edit($id) {
		//return;
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->load->model("generic_model");
        $data = array();
		$data['js_includes'][] = '/assets/admin/js/languages.js';
		
		
		if($this->input->post()){
			$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[1]');
		}
        if ($this->form_validation->run() == FALSE) {
			$data["mode"] = "Edit";
			$data["languages"] = $this->generic_model->get_language($id);
            $this->load->view('admin/languages/add', $data);
        } else {
			$data = $this->input->post();
			unset($data["add_language_submit"]);
			$this->generic_model->edit_language($data, $id);			
			$this->session->set_flashdata('success_msg', 'Language '.$data["name"].' has been updated!');
			redirect("/admin/languages/");			
		}
        
    }

}
