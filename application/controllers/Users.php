<?php

class Users extends CRM_Controller {

    function __construct() {
        parent::__construct();
    }
		
	public function logout(){
		$newdata = array(
				'user_id'   =>'',
				'user_name'  =>'',
				'user_email'     => '',
				'user_type'     => '',
				'logged_in' => FALSE,
		);
		$this->session->unset_userdata($newdata);
		$this->session->unset_userdata('user_data');
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('user_type');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('logged_in');
		$this->session->set_userdata(array("logged_in", 0));
		redirect("/");
	}

	public function profile() {
		$user_id = $this->session->userdata('user_id');

		if (empty($user_id)) {
			redirect("/");
		}
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->load->model("users_model");
		$this->load->model("generic_model");
        $data = array();
		$data['js_includes'][] = '/assets/admin/js/users.js';
		$data['css_includes'][] = '/assets/admin/css/users.css';
		
		if($this->input->post()){
			$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|strip_tags');
		}

        if ($this->form_validation->run() == FALSE) {
			$data["mode"] = "Edit";
			$data["detail"] = $this->users_model->get_user($user_id);
            $this->load->view('users/add', $data);
        } else {
			$this->load->model("users_model");
			$data = $this->input->post();
			unset($data["add_user_submit"]);
			
			// only update password in not empty
			if (empty($data["password"])) {
				unset($data["password"]);
			}

			$data["user_type"] = $this->generic_model->get_users_roles($user_id);
			$this->users_model->edit($data, $user_id);
			$this->session->set_flashdata('success_msg', 'User has been updated!');
			redirect("/users/profile");
		}
        
    }

    public function delete($id) {
		$user_data = $this->session->userdata();

		// if logged in & super admin
		if ($user_data['user_id'] && in_array(1, $user_data['user_type'])) {
			$this->load->model('users_model');
			if ($this->users_model->delete_user($id)) {
				echo 'deleted';
			}
		}
	}

	public function notifications() {
		$user_id = $this->session->userdata('user_id');

		if (empty($user_id)) {
			redirect("/");
		}
		
		$this->load->model("users_model");
		$this->load->model("generic_model");
		$this->load->model("content_model");
        $data = array();

        $data["mode"] = "Notifications";
        $data['notifications'] = $this->content_model->get_notifications();
        $this->load->view('users/notifications', $data);
        
    }

    public function recent_leads() {
		$this->load->model("users_model");
		$data = array();
		$data["series"] = $this->users_model->get_recent_leads();
		$this->load->view("users/recent_leads", $data);
	}


	public function view_assigned_telesales($id) {
		$data = array();
		$this->load->model("generic_model");
		$this->load->model("content_model");
		$data["user_type"] = "tsa";
		$data["dropdowns"] = $this->generic_model->get_dropdowns_telesales();
		$data["detail"] = $this->generic_model->get_telesale_detail($id, $type="tsa");
		$data["detail"]["package_selected_detail"] = $this->generic_model->get_package_selected_detail($data["detail"]["package_id"]);
		$data["lead_classifications"] = $this->generic_model->get_all_lead_classifications();
		$data["telesales_discount"] = $this->generic_model->get_telesales_discount();
		$data["package_classifications"] = $this->generic_model->get_package_classifications();
		$this->header_data['header_notifications'] = $this->content_model->get_notifications();

		$data["inject_script"] = '$("input, textarea, select").attr("disabled", "disabled");$("input[type=\'button\'], input[type=\'submit\'], button, #btn-enable-all").hide();';
		$this->load->view("users/view_assigned_detail", $data);
	}

	public function get_teammember_by_type($type)
    {
    	$type_id = 0;
    	if ($type == "DSE") {
    		$type_id = 7;
    		$activation_agent_type = 7;
    	}
    	if ($type == "TSA") {
    		$type_id = 5;
    		$activation_agent_type = 6;
    	}
    	if ($type == "CSR") {
    		$type_id = 6;
    		$activation_agent_type = 6;
    	}
    	$this->load->model("users_model");
    	$data = $this->users_model->get_teammember_by_type($type_id);
    	$activation_agent = $this->users_model->get_teammember_by_type($activation_agent_type);
    	$response_data = "<option value> Please Select </option>";
    	if (!empty($data)) {
    		foreach ($data as $key => $user) {
    			$response_data .= "<option value='".$user['id']."'>".ucfirst($user['first_name']) . " " . ucfirst($user['last_name'])."</option>";
    		}
    	}
    	$response_data_activation = "<option value> Please Select </option>";
    	if (!empty($data)) {
    		foreach ($activation_agent as $key => $user) {
    			$response_data_activation .= "<option value='".$user['id']."'>".ucfirst($user['first_name']) . " " . ucfirst($user['last_name'])."</option>";
    		}
    	}
    	$response['acquisition_name'] = $response_data;
    	$response['activation_agent_name'] = $response_data_activation;
    	print_r(json_encode($response));
    }
}