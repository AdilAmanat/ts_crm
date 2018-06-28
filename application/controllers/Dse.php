<?php

class Dse extends DSE_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model("generic_model");
    }
	
	public function index(){		
		$data = array();
		$data['js_includes'][] = '/assets/plugins/charts-c3/js/c3.min.js';
		$data['js_includes'][] = '/assets/plugins/charts-c3/js/d3.v3.min.js';
		$data['css_includes'][] = '/assets/plugins/charts-c3/plugin.css';
		$user_data = $this->session->userdata('user_data');	
		$user_type = $user_data['user_type'];
		// echo "<pre>";print_r($user_data);die;
		$data['rem_persentage'] = 0;
		$data['sale_persentage'] = 0;
		if (in_array(7, $user_type)) {
			$this->load->model("targets_model");
			$this->load->model("daily_sales_model");
			$target = $this->targets_model->get_target_by_user_id($user_data['id']);
			if(!empty($target))
			{
				$user_target = $target[0]['target_value'];
			}
			$filters['acquistion'] = 'DSE';
			$filters['acquistion_agent_id'] = $user_data['id'];
			$filters['status'] = "Active";
			$sales_data = $this->daily_sales_model->search_daily_sales($filters);
			$close_dsr = count($sales_data);

			$filters2['acquistion'] = 'DSE';
			$filters2['acquistion_agent_id'] = $user_data['id'];
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

		$this->load->view("csr/dashboard", $data);	
	}
	
	public function lead_generation(){
		$data = array();
		//error_reporting(E_ALL);
		$this->load->model("csr_model");
		$data["dropdowns"] = $this->csr_model->get_dropdowns_telesales();
		$this->load->view("telesale/telesale", $data);
	}
	
	public function assigned_leads(){		
		$data = array();
		//echo "CSR Home";exit;
		//echo "TSA Home";exit;
		//$data['js_includes'][] = '/assets/js/data_create.js';
		$this->load->model("csr_model");
		//$data["csr_status"] = $this->csr_model->get_csr_status();
		$data["series"] = $this->csr_model->get_assigned_series();
		$this->load->view("csr/index", $data);
	}
	
	public function update_status(){
		$this->load->model("csr_model");
		//$number_id = $this->input->post("id");
//		$status = $this->input->post("status");
		//echo $number_id ." : ". $status;exit;
		//$this->csr_model->update_status($number_id, $status);
		$data = $this->input->post();
		$this->csr_model->update_status($data);
		
	}
	
	public function update($export_token){
		$this->load->model("telesale_model");
		$this->load->model("csr_model");
		$data["csr_status"] = $this->csr_model->get_csr_status();
		$data["numbers"] = $this->telesale_model->get_assigned_numbers_by_series($export_token);
		$this->load->view("csr/update", $data);
	}
	
	public function assigned_telesales(){
		$data = array();
		$this->load->model("generic_model");
		$user_id = $this->session->userdata('user_id');
		$data["telesales"] = $this->generic_model->get_assigned_telesales($user_id);
		$this->load->view("csr/telesales_assigned", $data);
	}
	
	public function view_assigned_telesales($id){
		$data = array();
		$this->load->model("generic_model");
		$data["user_type"] = "csr";
		$data["dropdowns"] = $this->generic_model->get_dropdowns_telesales();
		$data["detail"] = $this->generic_model->get_telesale_detail($id, $type="csr");
		$data["detail"]["package_selected_detail"] = $this->generic_model->get_package_selected_detail($data["detail"]["package_id"]);
		$this->load->view("csr/view_assigned_detail", $data);
	}
	
	public function update_telesale($id){
		$this->load->model("generic_model");
		$user_id = $this->session->userdata('user_id');
		if(!$this->generic_model->is_assiged_me_lead_generation($user_id, $id))
			redirect("/");
		
		$postData = $this->input->post();
		//echo "<pre>"; print_r($postData); echo "</pre>";exit;
		$data = array(
			"assigned_by" => $user_id,
			"assignee" => NULL,
			"date_updated" => date("Y-m-d H:i:s"),
			"csr_status" => $postData["csr_status"],
			"csr_package_id" => $postData["csr_package_id"],
			"csr_package_detail_id" => $postData["csr_package_detail_id"],
			"csr_plan_description" => $postData["csr_plan_description"],
			"csr_remarks" => $postData["csr_remarks"],
			"is_csr_read" => 1
			//"csr" => $csr
		);
		$this->generic_model->update_lead_generation($data, $id);
		//echo $this->db->last_query()."<br>";exit;
		redirect("/csr/assigned-telesales/");		
	}
	
	public function reports(){
		$this->load->model("reports_model");
		$data["dropdowns"] = $this->reports_model->get_filters_dropdowns();
		$this->load->view("csr/reports", $data);
	}

	/*public function lead_submit(){
		$data = array();
		$data['c_page_title'] = 'Lead Submit';
		$this->load->view("dse/lead_submit", $data);
	}*/

	public function lead_submit_documents() {
		$data = array();
		$data['dropdowns']['dses'] = $this->generic_model->get_users_dropdowns(7);
		$data['dropdowns']['tl_dses'] = $this->generic_model->get_users_dropdowns(11);
		$data['dropdowns']['atl'] = $this->generic_model->get_users_dropdowns(14);
		$data['c_page_title'] = 'Lead Submit by Documents';
		$this->load->view("dse/lead_submit_documents", $data);
	}

	public function add_lead_submit_documents() {
		
		$this->load->model("generic_model");

		$data = $this->input->post();

		$this->generic_model->add_lead_submit_documents($data);
		redirect("/dse/lead-submit-documents/");		
	}

	/*public function lead_submit_form(){
		$data = array();
		$data['c_page_title'] = 'Lead Submit by Form';
		$this->load->view("dse/lead_submit_form", $data);
	}*/

	/*function upload_data(){
		set_time_limit(0);
		//echo "File in controller:<pre>"; print_r($_FILES); echo "<pre>";
		$this->load->helper('string');
		$token = random_string('alnum', 16);
		
		$this->load->model("numbers_model");
        $this->numbers_model->import_csv($token);
		//echo "Done";
		//exit;
        redirect("/back_office/validate/?token=$token");
    }
	
	function validate(){
		$token = $this->input->get("token");
		$this->load->model("numbers_model");
		$data["numbers"] = $this->numbers_model->get_temp_export($token);
		$this->load->view("back_office/index", $data);	
	}*/
	
}
