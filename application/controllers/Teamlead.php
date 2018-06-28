<?php

class Teamlead extends TL_Controller {

    function __construct() {
        parent::__construct();
    }
	
	public function index(){
		$data = array();
		$data['js_includes'][] = '/assets/plugins/charts-c3/js/c3.min.js';
		$data['js_includes'][] = '/assets/plugins/charts-c3/js/d3.v3.min.js';
		$data['css_includes'][] = '/assets/plugins/charts-c3/plugin.css';
		
		$this->load->view("teamlead/dashboard", $data);
	}
	public function assign_leads(){		
		$data = array();
		//echo "TL Home";exit;
		$data['css_includes'][] = '/assets/css/jquery-ui.css';
		$data['js_includes'][] = "//code.jquery.com/ui/1.11.4/jquery-ui.min.js";
		$this->load->model("teamlead_model");
		$this->load->model("csr_model");
		$data["csrs"] = $this->teamlead_model->get_csr();
		//$data["csr_status"] = $this->csr_model->get_csr_status();
		$data["team_members"] = $this->teamlead_model->get_team_members();
		$data["series"] = $this->teamlead_model->get_unassigned_series_without_feedbacks();
		$data["series_with_feedbacks"] = $this->teamlead_model->get_unassigned_series_with_feedbacks();
		//$data = array();
		$data["dropdowns"] = $this->teamlead_model->get_dropdowns_content();
		if(!$this->input->get()){
		}
		else{
			$filters = $this->input->get();
			$data["numbers"] = $this->teamlead_model->search($filters);
			//echo "<pre>"; print_r($filters); print_r($data["numbers"]); echo "</pre>";exit;
			$data["filters"] = $filters;
		}
		//echo "<pre>"; print_r($data); echo "</pre>";
		$this->load->view("teamlead/index", $data);
	}
	
	
	public function team_members(){
		$data = array();
		$this->load->model("teamlead_model");
		$data["team_members"] = $this->teamlead_model->get_team_members();
		//echo "<pre>"; print_r($data); echo "</pre>";
		$this->load->view("teamlead/team_members", $data);
	}
	
	public function view_member_numbers($tsa_id){
		//echo $tsa_id;exit;
		$data = array();
		$this->load->model("teamlead_model");
		$data["numbers"] = $this->teamlead_model->get_team_member_numbers($tsa_id);
		$data["tsa_id"] = $tsa_id;
		$this->load->view("teamlead/team_members_numbers", $data);
	}
	
	/*public function check_number_feedback($tsa_id, $num_id){
		echo "$tsa_id, $num_id";exit;
	}*/
	
	public function assign_numbers_without_feedback($export_token){
		$data = array();
		$this->load->model("teamlead_model");
		/*$data['css_includes'][] = '//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css';
		$data['js_includes'][] = '//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js';*/
		$data["team_members"] = $this->teamlead_model->get_team_members();
		$data["numbers"] = $this->teamlead_model->get_unassigned_numbers_from_series_without_feedback($export_token);
		$data["type"] = "without_feedbabcks";
		$data["c_page_title"] = "Assign Numbers";
		$this->load->view("teamlead/assign", $data);
	}

	public function assign_numbers_without_feedback_tl() {
		
		$user_id = $this->session->userdata('user_id');
		$this->load->model("teamlead_model");

		$data = array();

		$data['css_includes'][] = '//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css';
		$data['js_includes'][] = '//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js';

		$data["team_members"] = $this->teamlead_model->get_team_members();
		$data["numbers"] = $this->teamlead_model->get_unassigned_numbers_from_series_without_feedback('', $user_id);
		$data["type"] = "without_feedbabcks";
		$data["c_page_title"] = "Assign New Numbers";
		$data["load_datatable_search"] = true;
		$this->load->view("teamlead/assign", $data);
	}
	
	public function assign_numbers_with_feedback($export_token){
		//echo $export_token."<br>";exit;
		$data = array();
		$this->load->model("teamlead_model");
		$data["team_members"] = $this->teamlead_model->get_team_members();
		$data["numbers"] = $this->teamlead_model->get_unassigned_numbers_from_series_with_feedback($export_token);
		$data["type"] = "with_feedbacks";
		$this->load->view("teamlead/assign", $data);
	}
	
	public function assign_numbers_to_individual(){
		
		$this->load->model("teamlead_model");
		$tableData = stripcslashes($_POST['pTableData']);
		$tableData = json_decode($tableData,TRUE);
		//echo "<pre>"; print_r($tableData); echo "</pre>";
		$this->teamlead_model->assign_numbers_to_individual($tableData);
	}
	
	public function telesales(){
		$data = array();
		$this->load->model("teamlead_model");
		$data["dropdowns"] = $this->teamlead_model->get_dropdowns_telesales();
		$this->load->view("teamlead/telesales", $data);
	}
	
	public function reports(){
		$this->load->model("reports_model");
		$data["dropdowns"] = $this->reports_model->get_filters_dropdowns();
		$this->load->view("teamlead/reports", $data);
	}
	/*public function generate_numbers(){
		
		if(!$this->input->post()){
			
			$this->load->view("teamlead/search", $data);
		}
		else{
			
		}
	}*/
	
}
