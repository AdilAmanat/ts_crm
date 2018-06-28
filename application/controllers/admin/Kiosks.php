<?php

class Kiosks extends Admin_Controller {

    function __construct() {
        parent::__construct();
        //$this->output->enable_profiler(TRUE);
    }

    public function index() {
		//echo "1";exit;
        $data = array();
		
		$this->load->model("generic_model");
		$data["kiosks"] = $this->generic_model->get_all_kiosks();
        $this->load->view('admin/kiosks/index', $data);
    }
	
	public function add() {
		//return;
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->load->model("generic_model");
        $data = array();
		$data['js_includes'][] = '/assets/admin/js/kiosks.js';
		
		
		if($this->input->post()){
			$this->form_validation->set_rules('name', 'name', 'trim|required|min_length[1]');
		}
        if ($this->form_validation->run() == FALSE) {
			$data["mode"] = "Add";
            $this->load->view('admin/kiosks/add', $data);
        } else {
			$data = $this->input->post();
			//echo "<pre>"; print_r($data); echo "</pre>";exit;
			unset($data["add_kiosk_submit"]);
			$this->generic_model->add_kiosk($data);			
			$this->session->set_flashdata('success_msg', 'Kiosk '.$data["name"].' has been added!');
			redirect("/admin/kiosks/");			
		}
        
    }
	
	public function edit($id) {
		//return;
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->load->model("generic_model");
        $data = array();
		$data['js_includes'][] = '/assets/admin/js/kiosks.js';
		
		
		if($this->input->post()){
			$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[1]');
		}
        if ($this->form_validation->run() == FALSE) {
			$data["mode"] = "Edit";
			$data["kiosks"] = $this->generic_model->get_kiosk($id);
            $this->load->view('admin/kiosks/add', $data);
        } else {
			$data = $this->input->post();
			unset($data["add_kiosk_submit"]);
			$this->generic_model->edit_kiosk($data, $id);			
			$this->session->set_flashdata('success_msg', 'Kiosk '.$data["name"].' has been updated!');
			redirect("/admin/kiosks/");			
		}
        
    }

}
