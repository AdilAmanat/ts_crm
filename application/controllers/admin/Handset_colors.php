<?php

class Handset_colors extends Admin_Controller {

    function __construct() {
        parent::__construct();
        //$this->output->enable_profiler(TRUE);
    }

    public function index() {
		//echo "1";exit;
        $data = array();
		
		$this->load->model("generic_model");
		$data["handsets"] = $this->generic_model->get_all_handset_colors();
        $this->load->view('admin/handset_colors/index', $data);
    }
	
	public function add() {
		//return;
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->load->model("generic_model");
        $data = array();
		$data['js_includes'][] = '/assets/admin/js/handset_colors.js';
		
		
		if($this->input->post()){
			$this->form_validation->set_rules('color', 'color', 'trim|required|min_length[1]');
		}
        if ($this->form_validation->run() == FALSE) {
			$data["mode"] = "Add";
            $this->load->view('admin/handset_colors/add', $data);
        } else {
			$data = $this->input->post();
			//echo "<pre>"; print_r($data); echo "</pre>";exit;
			unset($data["add_color_status_submit"]);
			$this->generic_model->add_handset_color($data);			
			$this->session->set_flashdata('success_msg', 'Handset Color '.$data["color"].' has been added!');
			redirect("/admin/handset-colors/");			
		}
        
    }
	
	public function edit($id) {
		//return;
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->load->model("generic_model");
        $data = array();
		$data['js_includes'][] = '/assets/admin/js/handset_colors.js';
		
		
		if($this->input->post()){
			$this->form_validation->set_rules('color', 'Color', 'trim|required|min_length[1]');
		}
        if ($this->form_validation->run() == FALSE) {
			$data["mode"] = "Edit";
			$data["handsets"] = $this->generic_model->get_handset_color($id);
            $this->load->view('admin/handset_colors/add', $data);
        } else {
			$data = $this->input->post();
			unset($data["add_color_status_submit"]);
			$this->generic_model->edit_handset_color($data, $id);			
			$this->session->set_flashdata('success_msg', 'Handset Color '.$data["color"].' has been updated!');
			redirect("/admin/handset-colors/");			
		}
        
    }

}
