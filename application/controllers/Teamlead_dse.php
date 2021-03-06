<?php

class Teamlead_dse extends TL_DSE_Controller {

    function __construct() {
        parent::__construct();
    }
	
	public function index(){
		//echo "Teamlead CSR";exit;
		$data = array();
		$data['js_includes'][] = '/assets/plugins/charts-c3/js/c3.min.js';
		$data['js_includes'][] = '/assets/plugins/charts-c3/js/d3.v3.min.js';
		$data['css_includes'][] = '/assets/plugins/charts-c3/plugin.css';
		$user_data = $this->session->userdata('user_data');	
		$user_type = $user_data['user_type'];
		// echo "<pre>";print_r($user_data);die;
		$data['rem_persentage'] = 0;
		$data['sale_persentage'] = 0;
		if (in_array(11, $user_type)) {
			$this->load->model("targets_model");
			$this->load->model("daily_sales_model");
			$target = $this->targets_model->get_target_by_user_id($user_data['id']);
			if(!empty($target))
			{
				$user_target = $target[0]['target_value'];
			}
			$filters['acquistion'] = 'DSE';
			$filters['teamlead_id'] = $user_data['id'];
			$filters['status'] = "Active";
			$sales_data = $this->daily_sales_model->search_daily_sales($filters);
			$close_dsr = count($sales_data);

			$filters2['acquistion'] = 'DSE';
			$filters2['teamlead_id'] = $user_data['id'];
			$filters2['status != '] = "Active";
			$sales_data2 = $this->daily_sales_model->search_daily_sales($filters2);
			$open_dsr = count($sales_data2);
			
			$data['close_dsr'] = $close_dsr;
			$data['open_dsr'] = $open_dsr;
			$total_sale = 0;
			if (!empty($sales_data)) {
				foreach ($sales_data as $key => $sale) {
					$package_data = $this->daily_sales_model->get_packages($sale['package_id']);
					$total_sale += $package_data['package_price'];
				}
			}

			if(!empty($user_target))
			{
				$sale_persentage = ($total_sale/$user_target)*100;
				$rem_persentage = 100 - $sale_persentage;
			}
			if($rem_persentage)
				$data['rem_persentage'] = $rem_persentage;
			if($sale_persentage)
				$data['sale_persentage'] = $sale_persentage;
		}
		//echo "<pre>";print_r($data);die;
		$this->load->view("teamlead_dse/dashboard", $data);
	}
	
	public function tlagent_update(){
		$this->load->model("teamlead_csr_model");
		$data["numbers"] = $this->teamlead_csr_model->get_numbers_assigned_by_tl_agent();//exit;
		$data["assgined_by"] = "tsa";
		$this->load->view("teamlead_csr/assigned_by_tl_agent", $data);
	}
	
	public function csr_update(){
		$this->load->model("teamlead_csr_model");
		$data["numbers"] = $this->teamlead_csr_model->get_numbers_assigned_by_csr();//exit;
		$data["assgined_by"] = "tsa";
		$this->load->view("teamlead_csr/assigned_by_tl_agent", $data);
	}
	
	public function view_assigned($token, $timestamp/*, $assgined_by*/){
		$this->load->model("teamlead_csr_model");
		$data["numbers"] = $this->teamlead_csr_model->get_assigned_numbers_by_series($token, $timestamp/*, $assgined_by*/);
		//$data["assgined_by"] = $assgined_by;
		//$data["team_members"] = $this->teamlead_model->get_team_members();
		//$data["csrs"] = $this->teamlead_model->get_csrs();
		$this->header_data['header_notifications'] = $this->content_model->get_notifications();
		$this->load->view("teamlead_csr/view_assigned", $data);
	}
	
	public function view_assigned_detail($number_id, $id){
		$this->load->model("teamlead_csr_model");
		$data["detail"] = $this->teamlead_csr_model->get_number_detail($number_id, $id);
		//echo "<pre>"; print_r($data["detail"]); echo "</pre>";//exit;
		$data["team_members"] = $this->teamlead_csr_model->get_team_members();
		//echo "<pre>"; print_r($data["team_members"]); echo "</pre>";//exit;
		$data["csrs"] = $this->teamlead_csr_model->get_tl_agents();
		//echo "<pre>"; print_r($data); echo "</pre>";exit;
		//echo "<pre>"; print_r($data); echo "</pre>";
		$this->load->view("teamlead_csr/view_assigned_number_detail", $data);
	}
	
	public function telesales(){
		$data = array();
		$this->load->model("teamlead_model");
		$data["dropdowns"] = $this->teamlead_model->get_dropdowns_telesales();
		$this->load->view("teamlead_csr/telesales", $data);
	}
	
	public function assigned_telesales(){
		$data = array();
		$this->load->model("generic_model");
		$user_id = $this->session->userdata('user_id');
		$data["telesales"] = $this->generic_model->get_assigned_telesales($user_id);
		$this->load->view("teamlead_csr/telesales_assigned", $data);
	}
	
	public function view_assigned_telesales($id){
		$data = array();
		$this->load->model("generic_model");
		$data["user_type"] = "tl_csr";
		$data["dropdowns"] = $this->generic_model->get_dropdowns_telesales();
		$data["detail"] = $this->generic_model->get_telesale_detail($id, $type="tl_csr");
		$data["detail"]["package_selected_detail"] = $this->generic_model->get_package_selected_detail($data["detail"]["package_id"]);
		$this->header_data['header_notifications'] = $this->content_model->get_notifications();
		$this->load->view("teamlead_csr/view_assigned_detail", $data);
	}
	
	public function update_telesale($id){
		error_reporting(E_ALL);
		$this->load->model("generic_model");
		$user_id = $this->session->userdata('user_id');
		if(!$this->generic_model->is_assiged_me_lead_generation($user_id, $id))
			redirect("/");
		
		$csr = $this->input->post("csr");
		$data = array(
			"assigned_by" => $user_id,
			"assignee" => $csr,
			"date_updated" => date("Y-m-d H:i:s"),
			"csr" => $csr,
			"is_teamlead_csr_read" => 1
		);
		$this->generic_model->update_lead_generation($data, $id);
		//echo $this->db->last_query()."<br>";exit;
		redirect("/teamlead-csr/assigned-telesales/");		
	}
	
	public function assign_number(){
		$this->load->model("teamlead_model");
		$id = $this->input->post("id");
		$assign_to = $this->input->post("assign_to");
		$comment = $this->input->post("comment");
		$this->teamlead_model->assign_number($id, $assign_to, $comment);
	}
	
	
	
	//--------------------------functions from teamlead agent controllers----------------------------
	
	
	
	
	
	
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
		//echo $export_token."<br>";exit;
		$data = array();
		$this->load->model("teamlead_model");
		$data["team_members"] = $this->teamlead_model->get_team_members();
		$data["numbers"] = $this->teamlead_model->get_unassigned_numbers_from_series_without_feedback($export_token);
		$data["type"] = "without_feedbabcks";
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
