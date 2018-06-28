<?php

class Telesale extends TSA_Controller {

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
		// echo "<pre>";print_r($user_data);die;
		$data['rem_persentage'] = 0;
		$data['sale_persentage'] = 0;
		if (in_array(5, $user_type)) {
			$this->load->model("targets_model");
			$this->load->model("daily_sales_model");
			$target = $this->targets_model->get_target_by_user_id($user_data['id']);
			if(!empty($target))
			{
				$user_target = $target[0]['target_value'];
			}
			$filters['acquistion'] = 'TSA';
			$filters['acquistion_agent_id'] = $user_data['id'];
			$filters['status'] = "Active";
			$sales_data = $this->daily_sales_model->search_daily_sales($filters);
			$close_dsr = count($sales_data);

			$filters2['acquistion'] = 'TSA';
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

		$this->load->view("telesale/dashboard", $data);
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
			// redirect("/telesale/lead-generation");
			redirect("/telesale/assigned-leads");
		}
			
	}
	
	public function view_assigned_telesales($id){
		$data = array();
		$this->load->model("generic_model");
		$data["user_type"] = "tsa";
		$data["dropdowns"] = $this->generic_model->get_dropdowns_telesales();
		$data["detail"] = $this->generic_model->get_telesale_detail($id, $type="tsa");
		$data["detail"]["package_selected_detail"] = $this->generic_model->get_package_selected_detail($data["detail"]["package_id"]);
		$this->load->view("telesale/view_assigned_detail", $data);
	}
	
	public function assigned_leads(){		
		$data = array();
		//echo "TSA Home";exit;
		//$data['js_includes'][] = '/assets/js/data_create.js';
		$this->load->model("telesale_model");
		$data["series"] = $this->telesale_model->get_assigned_series();
		$this->load->view("telesale/index", $data);
	}
	
	public function update_status(){
		$this->load->model("telesale_model");
		$data = $this->input->post();
		//$number_id = $this->input->post("id");
		//$status = $this->input->post("status");
		//echo $number_id ." : ". $status;exit;
		$this->telesale_model->update_status($data);
		
	}
	
	public function update($export_token, $timestamp){
		$this->load->model("telesale_model");
		$this->load->model("generic_model");
		
		$data["numbers"] = $this->telesale_model->get_assigned_numbers_by_series($export_token, $timestamp);
		$data["dropdowns"] = $this->generic_model->get_dropdowns_telesales();
		$data["lead_classifications"] = $this->generic_model->get_all_lead_classifications();
		
		$data["tsa_status"] = $this->telesale_model->get_tsa_status();
		$data["telesales_discount"] = $this->generic_model->get_telesales_discount();
		$data["package_classifications"] = $this->generic_model->get_package_classifications();
		// $data["load_rec"] = true;
		// $data["load_doc"] = true;

		$this->load->view("telesale/update", $data);
	}
	
	public function notifications(){
		$this->load->model("content_model");
		$user_id = $this->session->userdata('user_id');
		$data["notifications"] = $this->content_model->get_all_notifications($user_id, "telesale");exit;
	}
	
	public function archived_notifications(){
		
	}
	
	public function delete_notifications(){
		
	}
	
	public function reports(){
		$this->load->model("reports_model");
		$data["dropdowns"] = $this->reports_model->get_filters_dropdowns();
		$this->load->view("telesale/reports", $data);
	}
	
}
