<?php

class Csr extends CSR_Controller {

    function __construct() {
        parent::__construct();
    }
	
	public function index(){		
		$data = array();
		$data['js_includes'][] = '/assets/plugins/charts-c3/js/c3.min.js';
		$data['js_includes'][] = '/assets/plugins/charts-c3/js/d3.v3.min.js';
		$data['css_includes'][] = '/assets/plugins/charts-c3/plugin.css';	
		$user_data = $this->session->userdata('user_data');	
		$user_type = $user_data['user_type'];
		if (in_array(8, $user_type) || in_array(9, $user_type)) {
			$this->load->model("targets_model");
			$this->load->model("daily_sales_model");
			$target = $this->targets_model->get_target_by_user_id($user_data['id']);
			if(!empty($target))
			{
				$user_target = $target[0]['target_value'];
			}
			$filters['sales_manager_id'] = $user_data['id'];
			$filters['status'] = "Active";
			$sales_data = $this->daily_sales_model->search_daily_sales($filters);
			$close_dsr = count($sales_data);

			$filters2['sales_manager_id'] = $user_data['id'];
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
			if($total_sale != 0)
			{
				$sale_persentage = ($total_sale/$user_target)*100;
				$rem_persentage = 100 - $sale_persentage;
			}
			$data['rem_persentage'] = $rem_persentage;
			$data['sale_persentage'] = $sale_persentage;
		}
		
		$this->load->view("csr/dashboard", $data);	
	}
	
	public function lead_generation(){
		$data = array();
		$this->load->model("generic_model");
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		if($this->input->post()){
			$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|min_length[1]');
		}
        if ($this->form_validation->run() == FALSE) {

        	$data = array();
        	$data["dropdowns"] = $this->generic_model->get_dropdowns_telesales();
        	$data["lead_classifications"] = $this->generic_model->get_all_lead_classifications();
        	$data["telesales_discount"] = $this->generic_model->get_telesales_discount();
        	$data["package_classifications"] = $this->generic_model->get_package_classifications();
        	$data["load_telesales_modal"] = true;
        	// $data["load_rec"] = true;
			// $data["load_doc"] = true;

			// $this->load->view("telesale/telesale", $data);
			$data["form_action"] = "csr/lead-generation";
			$this->load->view("telesale/templates/modal_lg_form.php", $data);
		}
		else {
			$data = $this->input->post();
			$this->load->model("generic_model");

			if (isset($_FILES['telesales_documents'])) {
				$data['telesales_documents'] = $_FILES['telesales_documents'];
			}
			if (isset($_FILES['telesales_call_recording'])) {
				$data['telesales_call_recording'] = $_FILES['telesales_call_recording'];
			}

			$this->generic_model->add_lead_generation($data);
			redirect("/csr/assigned-leads");
		}
			
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
		//echo "<pre>"; print_r($data["telesales"]); echo "</pre>";
		$this->load->view("csr/telesales_assigned", $data);
	}
	
	public function view_assigned_telesales($id){
		$data = array();
		$this->load->model("generic_model");
		$data["user_type"] = "csr";
		$data["dropdowns"] = $this->generic_model->get_dropdowns_telesales();
		$data["detail"] = $this->generic_model->get_telesale_detail($id, $type="csr");
		$data["detail"]["package_selected_detail"] = $this->generic_model->get_package_selected_detail($data["detail"]["package_id"]);

		$data["lead_classifications"] = $this->generic_model->get_all_lead_classifications();
		$data["telesales_discount"] = $this->generic_model->get_telesales_discount();
		$data["package_classifications"] = $this->generic_model->get_package_classifications();
		$this->load->view("csr/view_assigned_detail", $data);
	}
	
	public function update_telesale($id){
		$this->load->model("generic_model");
		
		$user_id = $this->session->userdata('user_id');
		if(!$this->generic_model->is_assiged_me_lead_generation($user_id, $id))
			redirect("/");
		
		$postData = $this->input->post();
		$data = $this->input->post();
		
		/*$data = array(
			//"assigned_by" => $user_id,
			//"assignee" => NULL,
			"date_updated" => date("Y-m-d H:i:s"),
			"csr_status" => $postData["csr_status"],
			"csr_package_id" => $postData["csr_package_id"],
			"csr_package_detail_id" => $postData["csr_package_detail_id"],
			"csr_plan_description" => $postData["csr_plan_description"],
			"csr_remarks" => $postData["csr_remarks"],
			"is_csr_read" => 1,
			//"csr" => $csr
		);*/

		$data["date_updated"] = date("Y-m-d H:i:s");
		$data["csr_status"] = $postData["csr_status"];
		$data["csr_package_id"] = $postData["csr_package_id"];
		$data["csr_package_detail_id"] = $postData["csr_package_detail_id"];
		$data["csr_plan_description"] = $postData["csr_plan_description"];
		$data["csr_remarks"] = $postData["csr_remarks"];
		$data["is_csr_read"] = 1;

		if($postData["csr_status"] == "1"){
			$data["assignee"] = $this->generic_model->get_bo_to_assign_lead();
			$data["bo"] = $data["assignee"];
		}
		$this->generic_model->update_lead_generation($data, $id);
		redirect("/csr/assigned-telesales/");		
	}
	
	public function reports(){
		$this->load->model("reports_model");
		$data["dropdowns"] = $this->reports_model->get_filters_dropdowns();
		$this->load->view("csr/reports", $data);
	}
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
