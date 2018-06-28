<?php

class Daily_sales extends Admin_Controller {

    function __construct() {
        parent::__construct();
        //$this->output->enable_profiler(TRUE);
    }

    public function index() {
		//echo "1";exit;
        $data = array();
		$data['css_includes'][] = '/assets/css/jquery-ui.css';
		$data['js_includes'][] = "//code.jquery.com/ui/1.11.4/jquery-ui.min.js";
		
		$this->load->model("daily_sales_model");
		$data["sales"] = array();
		$data["dropdowns"] = $this->daily_sales_model->get_dropdowns();
		if($this->input->get()){
			$data["filters"] = $this->input->get();
			$data["sales"] = $this->daily_sales_model->search_daily_sales($data["filters"]);
		}
		else{
			$data["sales"] = $this->daily_sales_model->get_all_sales();
		}
		//echo "<pre>"; print_r($data["packages"]); echo "</pre>";//exit;
        $this->load->view('admin/daily_sales/index', $data);
    }
	
	public function add() {
		//return;
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->load->model("daily_sales_model");
        $data = array();
		$data['css_includes'][] = '/assets/css/jquery-ui.css';
		$data['js_includes'][] = "//code.jquery.com/ui/1.11.4/jquery-ui.min.js";
		$data['js_includes'][] = '/assets/admin/js/daily_sales.js';
		$data["dropdowns"] = $this->daily_sales_model->get_dropdowns();
		
		
		if($this->input->post()){
			$this->form_validation->set_rules('month', 'Month', 'trim|required|min_length[1]');
		}
        if ($this->form_validation->run() == FALSE) {
			$data["mode"] = "Add";
            $this->load->view('admin/daily_sales/add', $data);
        } else {
			$data = $this->input->post();
			$this->daily_sales_model->add($data);			
			$this->session->set_flashdata('success_msg', 'Daily Sale has been added!');
			redirect("/admin/daily-sales/");			
		}
        
    }
	
	public function edit($id) {
		//return;
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->load->model("daily_sales_model");
        $data = array();
		$data['css_includes'][] = '/assets/css/jquery-ui.css';
		$data['js_includes'][] = "//code.jquery.com/ui/1.11.4/jquery-ui.min.js";
		$data['js_includes'][] = '/assets/admin/js/daily_sales.js';
		$data["dropdowns"] = $this->daily_sales_model->get_dropdowns();
		
		
		if($this->input->post()){
			$this->form_validation->set_rules('month', 'Month', 'trim|required|min_length[1]');
		}
        if ($this->form_validation->run() == FALSE) {
			$data["mode"] = "Edit";
			$data["sale"] = $this->daily_sales_model->get_sale($id);
			//echo "<pre>"; print_r($data["package"]); echo "</pre>";exit;
            $this->load->view('admin/daily_sales/add', $data);
        } else {
			$data = $this->input->post();
			$this->daily_sales_model->edit($data, $id);			
			$this->session->set_flashdata('success_msg', 'Daily Sale has been updated!');
			redirect("/admin/daily-sales/");			
		}
        
    }
	
	public function get_package_detail(){
		$this->load->model("daily_sales_model");
		$package_id = $this->input->post("package_id");
		$detail = $this->daily_sales_model->get_package_detail($package_id);
		echo json_encode($detail);
	}
	
	public function view($id){
		$this->load->model("daily_sales_model");
		$data["sale"] = $this->daily_sales_model->search_daily_sales($filters = false, $id);
		$data["sale"] = $data["sale"][0];
		//echo "<pre>"; print_r($data["sale"]); echo "</pre>";//exit;
		$this->load->view("admin/daily_sales/view", $data);
	}

}
