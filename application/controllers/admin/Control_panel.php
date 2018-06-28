<?php

class Control_panel extends Admin_Controller {

    function __construct() {
        parent::__construct();
        //$this->output->enable_profiler(TRUE);
    }
	
	public function data_sources(){
		//error_reporting(E_ALL);
		//echo "1";exit;
        $data = array();
		
		$this->load->model("generic_model");
		$data["data_sources"] = $this->generic_model->get_all_data_sources();
		
        $this->load->view('admin/data_source/index', $data);
	}
    public function index() {
		redirect("/");
    }
	
	public function data_source_add() {
		//return;
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->load->model("generic_model");
        $data = array();
		$data['js_includes'][] = '/assets/admin/js/data_source.js';
		
		
		if($this->input->post()){
			$this->form_validation->set_rules('source', 'source', 'trim|required|min_length[1]');
		}
        if ($this->form_validation->run() == FALSE) {
			$data["mode"] = "Add";
            $this->load->view('admin/data_source/add', $data);
        } else {
			$data = $this->input->post();
			//echo "<pre>"; print_r($data); echo "</pre>";exit;
			unset($data["add_color_status_submit"]);
			$this->generic_model->add_data_source($data);			
			$this->session->set_flashdata('success_msg', 'Data source '.$data["source"].' has been added!');
			redirect("/admin/control-panel/data-sources/");			
		}
        
    }
	
	public function data_source_edit($id) {
		//return;
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->load->model("generic_model");
        $data = array();
		$data['js_includes'][] = '/assets/admin/js/data_source.js';
		
		
		if($this->input->post()){
			$this->form_validation->set_rules('source', 'source', 'trim|required|min_length[1]');
		}
        if ($this->form_validation->run() == FALSE) {
			$data["mode"] = "Edit";
			$data["data_sources"] = $this->generic_model->get_data_source($id);
            $this->load->view('admin/data_source/add', $data);
        } else {
			$data = $this->input->post();
			unset($data["add_color_status_submit"]);
			$this->generic_model->edit_data_source($data, $id);			
			$this->session->set_flashdata('success_msg', 'Data Source '.$data["color"].' has been updated!');
			redirect("/admin/control-panel/data-sources/");
		}
        
    }

}
