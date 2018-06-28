<?php

class Home extends CRM_Controller {

    function __construct() {
        parent::__construct();
    }
	
	public function index(){
		//error_reporting(E_ALL);	
		$data = array();
		//$data['css_includes'][] = '/assets/css/login.css?v='.time();
		$this->load->helper('form');
		$this->load->library('form_validation');
		
				$user_data = $this->session->userdata('user_data');
				//echo "<pre>"; print_r($user_data); echo "</pre>";//exit;
				if($user_data){
					if(in_array(1, $user_data['user_type'])){
						redirect('admin/');
					}
					if(in_array(2, $user_data['user_type'])){
						redirect('generate/');
					}
					if(in_array(3, $user_data['user_type'])){
						redirect('back-office/');
					}
					if(in_array(4, $user_data['user_type'])){
						redirect('teamlead_agent/');
					}
					if(in_array(5, $user_data['user_type'])){
						redirect('telesale/');
					}
					if(in_array(6, $user_data['user_type'])){
						redirect('csr/');
					}
					if(in_array(7, $user_data['user_type'])){
						redirect('dse/');
					}
					if(in_array(10, $user_data['user_type'])){
						redirect('teamlead-csr/');
					}
					if(in_array(11, $user_data['user_type'])){
						redirect('teamlead_dse/');
					}
					if(in_array(15, $user_data['user_type'])){
						redirect('targets/');
					}
				}
				
		if($this->input->post()){
			$this->form_validation->set_rules('username', 'Email', 'trim|required|min_length[1]');
		}
        if ($this->form_validation->run() == FALSE){
			 $this->header_view = 'templates/login_header';
        	$this->footer_view = 'templates/login_footer';
            $this->load->view('home/index', $data);
        } else {
			$data = $this->input->post();
			$panel = $data["panel"];
			unset($data["login-btn"]);
			unset($data["panel"]);
			$this->load->model("users_model");
			$result = $this->users_model->login($data);
			$user_data = $this->session->userdata('user_data');
			//echo "Panel: "; var_dump($panel);echo "<br>";
			//var_dump($this->users_model->is_tl()); echo "<br>";
				//echo "<pre>"; print_r($user_data); echo "</pre>";exit;
			if($result) {
				$panel = "";
				if($panel != ""){
					$condition = true;
					if($panel == '1'){
						if($this->users_model->is_admin())
							redirect("admin/");
						else
							$condition = false;
					}
					else if($panel == '2'){
						if($this->users_model->is_generator())
							redirect("generate/");
						else
							$condition = false;
					}
					else if($panel == '3'){
						if($this->users_model->is_bl())
							redirect("back-office/");
						else
							$condition = false;
					}
					else if($panel == '4'){
						if($this->users_model->is_tl())
							redirect("teamlead-agent/");
						else
							$condition = false;
					}
					else if($panel == '10'){
						if($this->users_model->is_tl())
							redirect("teamlead-csr/");
						else
							$condition = false;
					}
					else if($panel == '5'){
						if($this->users_model->is_tsa())
							redirect("telesale/");
						else
							$condition = false;
					}
					else if($panel == '6'){
						if($this->users_model->is_tsa())
							redirect("csr/");
						else
							$condition = false;
					}
					
					if(!$condition){
						$user_data = $this->session->userdata('user_data');
						if(in_array(1, $user_data['user_type'])){
							redirect('admin/');
						}
						if(in_array(2, $user_data['user_type'])){
							redirect('generate/');
						}
						if(in_array(3, $user_data['user_type'])){
							redirect('back-office/');
						}
						if(in_array(4, $user_data['user_type'])){
							redirect('teamlead-agent/');
						}
						if(in_array(10, $user_data['user_type'])){
							redirect('teamlead-csr/');
						}
						if(in_array(5, $user_data['user_type'])){
							redirect('telesale/');
						}
						if(in_array(6, $user_data['user_type'])){
							redirect('csr/');
						}
					}
				}
				else{
					//echo "else";exit;
					$user_data = $this->session->userdata('user_data');
					if(in_array(1, $user_data['user_type'])){
						redirect('admin/');
					}
					if(in_array(2, $user_data['user_type'])){
						redirect('generate/');
					}
					if(in_array(3, $user_data['user_type'])){
						redirect('back-office/');
					}
					if(in_array(4, $user_data['user_type'])){
						redirect('teamlead-agent/');
					}
					if(in_array(5, $user_data['user_type'])){
						redirect('telesale/');
					}
					if(in_array(6, $user_data['user_type'])){
						redirect('csr/');
					}
					if(in_array(7, $user_data['user_type'])){
						redirect('dse/');
					}
					if(in_array(10, $user_data['user_type'])){
						redirect('teamlead-csr/');
					}
					if(in_array(11, $user_data['user_type'])){
						redirect('teamlead-dse/');
					}
					if(in_array(15, $user_data['user_type'])){
						redirect('targets/');
					}
				}
			}else{
                $this->session->set_flashdata('error_msg', 'Invalid email or password!');
                redirect('/');
			}		
		}
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
		redirect("/home");
	}
	
}
