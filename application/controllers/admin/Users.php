<?php

class Users extends Admin_Controller {

    function __construct() {
        parent::__construct();
        //$this->output->enable_profiler(TRUE);
    }

    public function index() {
		
        $data = array();
		$data['js_includes'][] = '/assets/admin/js/users_home.js';
		$this->load->model("users_model");
		$filters = $this->input->get();
		$data["filters"] = $filters;
		$data["users"] = $this->users_model->get_all_users($filters);
		$data["dropdowns"] = $this->users_model->get_filters_dropdowns();
        $this->load->view('admin/users/index', $data);
    }
	
	public function add() {
		//return;
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->load->model("users_model");
		$this->load->model("generic_model");
        $data = array();
		$data['js_includes'][] = '/assets/admin/js/users.js';
		//$data['css_includes'][] = '/assets/css/crm.css';
		$data['css_includes'][] = '/assets/admin/css/users.css';
		
		
		if($this->input->post()){
			$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[1]');
		}
        if ($this->form_validation->run() == FALSE) {
			$data["mode"] = "Add";
			
			$data['teamleads'] = $this->users_model->get_teamleads();
			$data['teamleads_dse'] = $this->users_model->get_teamleads_dse();
			$data['teamleads_csr'] = $this->users_model->get_teamleads_csr();
			$data['teamleads_bo'] = $this->users_model->get_teamleads_bo();
			$data['managers'] = $this->users_model->get_managers();
			$data["user_type"] = $this->users_model->get_user_types();
			$data["call_centers"] = $this->generic_model->get_all_call_centers();
			$data["languages"] = $this->generic_model->get_all_languages();
			//echo "<pre>"; print_r($data['teamleads_csr']); echo "</pre>";
            $this->load->view('admin/users/add', $data);
        } else {
			$this->load->model("users_model");
			$data = $this->input->post();
			//echo "<pre>"; print_r($data); echo "</pre>";exit;
			unset($data["add_user_submit"]);
			$this->users_model->add($data);			
			$this->session->set_flashdata('success_msg', 'User '.$data["first_name"].' has been added!');
			redirect("/admin/users/");			
		}
        
    }
	
	public function edit($user_id) {
		//return;
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->load->model("users_model");
		$this->load->model("generic_model");
        $data = array();
		$data['js_includes'][] = '/assets/admin/js/users.js';
		//$data['css_includes'][] = '/assets/css/crm.css';
		$data['css_includes'][] = '/assets/admin/css/users.css';
		
		if($this->input->post()){
			$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[1]');
		}
        if ($this->form_validation->run() == FALSE) {
			$data["mode"] = "Edit";
			$data["detail"] = $this->users_model->get_user($user_id);
			//echo "<pre>"; print_r($data["detail"]); echo "</pre><br><br>";
			$data['teamleads'] = $this->users_model->get_teamleads();
			$data['teamleads_dse'] = $this->users_model->get_teamleads_dse();
			$data['teamleads_csr'] = $this->users_model->get_teamleads_csr();
			$data['teamleads_bo'] = $this->users_model->get_teamleads_bo();
			$data['managers'] = $this->users_model->get_managers();
			$data["user_type"] = $this->users_model->get_user_types();
			$data["call_centers"] = $this->generic_model->get_all_call_centers();
			$data["languages"] = $this->generic_model->get_all_languages();
			//echo "<pre>"; print_r($data["detail"]); echo "</pre>";//exit;
			//echo "<pre>"; print_r($data['teamleads_csr']); echo "</pre>";
            $this->load->view('admin/users/add', $data);
        } else {
			$this->load->model("users_model");
			$data = $this->input->post();
			//echo "<pre>"; print_r($_FILES); echo "</pre>";
			//echo "<pre>"; print_r($data); echo "</pre>";exit;
			unset($data["add_user_submit"]);
			$this->users_model->edit($data, $user_id);			
			$this->session->set_flashdata('success_msg', 'User '.$data["first_name"].' has been updated!');
			redirect("/admin/users/");			
		}
        
    }

}
