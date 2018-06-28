<?php

class Packages extends Admin_Controller {

    function __construct() {
        parent::__construct();
        //$this->output->enable_profiler(TRUE);
    }

    public function index() {
		//echo "1";exit;
        $data = array();
		
		$this->load->model("packages_model");
		$data["packages"] = $this->packages_model->get_packages();
		//echo "<pre>"; print_r($data["packages"]); echo "</pre>";//exit;
        $this->load->view('admin/packages/index', $data);
    }
	
	public function add() {
		//return;
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->load->model("packages_model");
        $data = array();
		$data['js_includes'][] = '/assets/admin/js/packages.js';
		if($this->input->post()){
			$this->form_validation->set_rules('package_name', 'Name', 'trim|required|min_length[1]');
		}
        if ($this->form_validation->run() == FALSE) {
			$data["mode"] = "Add";
			$data["durations"] = $this->packages_model->get_package_duration();	
            $this->load->view('admin/packages/add', $data);
        } else {
			$data = $this->input->post();
			$this->packages_model->add($data);			
			$this->session->set_flashdata('success_msg', 'Package '.$data["package_name"].' has been added!');
			redirect("/admin/packages/");			
		}
        
    }
	
	public function edit($id) {
		//return;
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->load->model("packages_model");
        $data = array();
		$data['js_includes'][] = '/assets/admin/js/packages.js';	
		if($this->input->post()){
			$this->form_validation->set_rules('package_name', 'Name', 'trim|required|min_length[1]');
		}
        if ($this->form_validation->run() == FALSE) {
			$data["mode"] = "Edit";
			$data["package"] = $this->packages_model->get_packages($id);
			$data["durations"] = $this->packages_model->get_package_duration();	
			//echo "<pre>"; print_r($data); echo "</pre>";exit;
            $this->load->view('admin/packages/edit', $data);
        } else {
			$data = $this->input->post();
			$this->packages_model->edit($data, $id);			
			$this->session->set_flashdata('success_msg', 'Package '.$data["package_name"].' has been updated!');
			redirect("/admin/packages/");			
		}
        
    }
	
	public function durations(){
		$this->load->model("packages_model");
		$data["durations"] = $this->packages_model->get_package_duration();
		//$data["package"] = $data["package"][0];
		//echo "<pre>"; print_r($data["package"]); echo "</pre>";//exit;
		$this->load->view("admin/packages/durations", $data);
	}
	
	public function view($id){
		$this->load->model("packages_model");
		$data["package"] = $this->packages_model->get_packages($id);
		//$data["package"] = $data["package"][0];
		//echo "<pre>"; print_r($data["package"]); echo "</pre>";//exit;
		$this->load->view("admin/packages/view", $data);
	}
	
	public function add_duration() {
		//return;
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->load->model("packages_model");
        $data = array();
		$data['js_includes'][] = '/assets/admin/js/add_package_duration.js';
		
		
		if($this->input->post()){
			$this->form_validation->set_rules('duration', 'Duration', 'trim|required|min_length[1]');
		}
        if ($this->form_validation->run() == FALSE) {
			$data["mode"] = "Add";
            $this->load->view('admin/packages/add_duration', $data);
        } else {
			$data = $this->input->post();
			$this->packages_model->add_package_duration($data);			
			$this->session->set_flashdata('success_msg', 'Package Duration '.$data["duration"].' has been added!');
			redirect("/admin/packages/durations/");			
		}
        
    }
	
	public function edit_duration($id) {
		//return;
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->load->model("packages_model");
        $data = array();
		$data['js_includes'][] = '/assets/admin/js/add_package_duration.js';
		
		
		if($this->input->post()){
			$this->form_validation->set_rules('duration', 'Duration', 'trim|required|min_length[1]');
		}
        if ($this->form_validation->run() == FALSE) {
			$data["mode"] = "Edit";
			$data["duration"] = $this->packages_model->get_package_duration($id);
            $this->load->view('admin/packages/add_duration', $data);
        } else {
			$data = $this->input->post();
			$this->packages_model->edit_package_duration($data, $id);			
			$this->session->set_flashdata('success_msg', 'Package Duration '.$data["duration"].' has been updated!');
			redirect("/admin/packages/durations/");			
		}
        
    }

}
