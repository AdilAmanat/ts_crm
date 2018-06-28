<?php

class Promo_devices extends Admin_Controller {

    function __construct() {
        parent::__construct();
        //$this->output->enable_profiler(TRUE);
    }

    public function index() {
		//echo "1";exit;
        $data = array();
		
		$this->load->model("generic_model");
		$data["handsets"] = $this->generic_model->get_all_promo_devices();
        $this->load->view('admin/promo_devices/index', $data);
    }
	
	public function add() {
		//return;
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->load->model("generic_model");
        $data = array();
		$data['js_includes'][] = '/assets/admin/js/promo_devices.js';
		
		
		if($this->input->post()){
			$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[1]');
		}
        if ($this->form_validation->run() == FALSE) {
			$data["mode"] = "Add";
            $this->load->view('admin/promo_devices/add', $data);
        } else {
			$data = $this->input->post();
			//echo "<pre>"; print_r($data); echo "</pre>";exit;
			unset($data["add_promo_device_submit"]);
			$this->generic_model->add_promo_device($data);			
			$this->session->set_flashdata('success_msg', 'Promo Device '.$data["name"].' has been added!');
			redirect("/admin/promo-devices/");			
		}
        
    }
	
	public function edit($id) {
		//return;
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->load->model("generic_model");
        $data = array();
		$data['js_includes'][] = '/assets/admin/js/promo_devices.js';
		
		
		if($this->input->post()){
			$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[1]');
		}
        if ($this->form_validation->run() == FALSE) {
			$data["mode"] = "Edit";
			$data["handsets"] = $this->generic_model->get_promo_device($id);
            $this->load->view('admin/promo_devices/add', $data);
        } else {
			$data = $this->input->post();
			unset($data["add_promo_device_submit"]);
			$this->generic_model->edit_promo_device($data, $id);			
			$this->session->set_flashdata('success_msg', 'Promo Device '.$data["color"].' has been updated!');
			redirect("/admin/promo-devices/");			
		}
        
    }

}
