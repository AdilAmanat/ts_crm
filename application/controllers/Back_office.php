<?php

class Back_office extends BL_Controller {

    function __construct() {
        parent::__construct();
    }
	
	public function index(){		
		$data = array();
		//echo "Back Office Home<br>";//exit;
		/*$this->load->model("back_office_model");
		$data['css_includes'][] = "http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css";
		$data["series"] = $this->back_office_model->get_generated_series();*/

		$data['js_includes'][] = '/assets/plugins/charts-c3/js/c3.min.js';
		$data['js_includes'][] = '/assets/plugins/charts-c3/js/d3.v3.min.js';
		$data['css_includes'][] = '/assets/plugins/charts-c3/plugin.css';		
		$this->load->view("back_office/dashboard", $data);
		
		$this->load->view("back_office/index", $data);
	}
	
	public function convert_to_daily_sale($telesales_id){
		$data = array();
		$this->load->model("generic_model");
		$this->load->model("back_office_model");
		$this->load->model("daily_sales_model");
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$data['css_includes'][] = '/assets/css/jquery-ui.css';
		$data['js_includes'][] = "//code.jquery.com/ui/1.11.4/jquery-ui.min.js";
		if($this->input->post()){
			$this->form_validation->set_rules('month', 'Month', 'trim|required|min_length[1]');
		}
        if ($this->form_validation->run() == FALSE) {
			$data["dropdowns"] = $this->daily_sales_model->get_dropdowns();
			$data["sale"] = $this->generic_model->get_telesale_detail($telesales_id);
			$data["sale"]["package_selected_detail"] = $this->generic_model->get_package_selected_detail($data["sale"]["csr_package_id"]);
			$data["sale"]["extra_remarks"] = "";
			$data["sale"]["customer_name"] = $data["sale"]["first_name"] . " " . $data["sale"]["last_name"];
			$data["sale"]["alternate_no"] = $data["sale"]["alternative_no"];
			$data["sale"]["city_id"] = $data["sale"]["city"];
			$data["sale"]["package_id"] = $data["sale"]["csr_package_id"];
			$data["sale"]["package_detail_id"] = $data["sale"]["csr_package_detail_id"];
			$data["sale"]["plan_description"] = $data["sale"]["csr_plan_description"];
			$data["sale"]["directory_no"] = $data["sale"]["mobile_no"];
			$data["sale"]["lead_classification_id"] = $data["sale"]["contact_type"];
			
			$data["mode"] = "Add";
			$this->load->view('back_office/add_daily_sale', $data);
		}
		else{
			$telesales_data = array("is_dsr_created" => 1);
			$this->generic_model->update_lead_generation($telesales_data, $telesales_id);
			
			$data = $this->input->post();
			$data["lead_id"] = $telesales_id;
			$this->daily_sales_model->add($data);			
			$this->session->set_flashdata('success_msg', 'Daily Sale has been added!');
			redirect("/back-office/closed-sales/");
		}
		
		
	}
	
	public function closed_sales(){
		$this->load->model("back_office_model");
		
		$user_id = $this->session->userdata('user_id');
		$data = array();
		$data["telesales"] = $this->back_office_model->get_closed_sales($user_id);

		$this->load->view('back_office/telesales_assigned', $data);
	}
	
	public function view_assigned_telesales($id){
		$data = array();
		$this->load->model("generic_model");
		$this->load->model("back_office_model");
		$data["user_type"] = "backoffice";
		$data["dropdowns"] = $this->generic_model->get_dropdowns_telesales();
		$data["detail"] = $this->generic_model->get_telesale_detail($id);
		$data["detail"]["package_selected_detail"] = $this->generic_model->get_package_selected_detail($data["detail"]["package_id"]);

		$data["telesales_discount"] = $this->generic_model->get_telesales_discount();
		$data["package_classifications"] = $this->generic_model->get_package_classifications();
		$data["lead_classifications"] = $this->generic_model->get_all_lead_classifications();
		$this->load->view("back_office/view_assigned_telesale_detail", $data);
	}
	
	public function daily_sales(){
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
        $this->load->view('back_office/daily_sale', $data);
	}
	
	public function add_daily_sale() {
		//return;
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->load->model("daily_sales_model");
        $data = array();
		$data['css_includes'][] = '/assets/css/jquery-ui.css';
		$data['js_includes'][] = "//code.jquery.com/ui/1.11.4/jquery-ui.min.js";
		$data['js_includes'][] = '/assets/admin/js/daily_sales.js';
		$data["dropdowns"] = $this->daily_sales_model->get_dropdowns();
		$this->load->model("generic_model");
		
		$data['dropdowns']["internal_discount"] = $this->generic_model->get_telesales_discount();
		
		if($this->input->post()){
			$this->form_validation->set_rules('submission_date', 'Submission Date', 'trim|required|min_length[1]');
		}
        if ($this->form_validation->run() == FALSE) {
			$data["mode"] = "Add";
            $this->load->view('back_office/add_daily_sale', $data);
        } else {
			$data = $this->input->post();
			$this->daily_sales_model->add($data);			
			$this->session->set_flashdata('success_msg', 'Daily Sale has been added!');
			redirect("/back_office/daily-sales/");			
		}
        
    }

    public function update_dse_document() {	
		
		if($this->input->post()){
			$this->load->library('form_validation');
			$this->load->model("dse_model");

			$this->form_validation->set_rules('id', 'ID', 'required|numeric|max_length[11]');
			$this->form_validation->set_rules('status', 'Status', 'required|trim|strip_tags');
			
			if ($this->form_validation->run() != FALSE) {
				$data = array(
						'status' => $this->input->post('status')
				);
				$this->dse_model->update_dse_document($data, $this->input->post('id'));
	        }
		}        
    }
	
	public function edit_daily_sale($id) {
		//return;
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->load->model("daily_sales_model");
        $data = array();
		$data['css_includes'][] = '/assets/css/jquery-ui.css';
		$data['js_includes'][] = "//code.jquery.com/ui/1.11.4/jquery-ui.min.js";
		$data['js_includes'][] = '/assets/admin/js/daily_sales.js';
		$data["dropdowns"] = $this->daily_sales_model->get_dropdowns();
		$this->load->model("generic_model");
		$data['dropdowns']["internal_discount"] = $this->generic_model->get_telesales_discount();
		
		if($this->input->post()){
			$this->form_validation->set_rules('submission_date', 'Submission Date', 'trim|required|min_length[1]');
		}
        if ($this->form_validation->run() == FALSE) {
			$data["mode"] = "Edit";
			$data["sale"] = $this->daily_sales_model->get_sale($id);
			//echo "<pre>"; print_r($data["package"]); echo "</pre>";exit;
            $this->load->view('back_office/add_daily_sale', $data);
        } else {
			$data = $this->input->post();	
			$this->daily_sales_model->edit($data, $id);			
			$this->session->set_flashdata('success_msg', 'Daily Sale has been updated!');
			redirect("/back_office/daily-sales/");			
		}
        
    }
	
	public function get_package_detail(){
		$this->load->model("daily_sales_model");
		$package_id = $this->input->post("package_id");
		$detail = $this->daily_sales_model->get_package_detail($package_id);
		echo json_encode($detail);
	}
	
	public function view_daily_sale($id){
		$this->load->model("daily_sales_model");
		$data["sale"] = $this->daily_sales_model->search_daily_sales($filters = false, $id);
		$data["sale"] = $data["sale"][0];
		//echo "<pre>"; print_r($data["sale"]); echo "</pre>";//exit;
		$this->load->view("back_office/view_daily_sale", $data);
	}
	
	
	public function reports(){
		$this->load->model("reports_model");
		$data["dropdowns"] = $this->reports_model->get_filters_dropdowns();
		$this->load->view("back_office/reports", $data);
	}
	
	
	public function dse_documents() {
		
		$this->load->model("dse_model");
		$this->load->model("generic_model");
		$this->load->model("telesale_model");

		$data = array();
		$data["dropdowns"] = $this->generic_model->get_dropdowns_telesales();
		$data["lead_classifications"] = $this->generic_model->get_all_lead_classifications();
		$data["telesales_discount"] = $this->generic_model->get_telesales_discount();
		$data["package_classifications"] = $this->generic_model->get_package_classifications();
		// $data["load_rec"] = true;
		// $data["load_doc"] = true;

		$data["dse_documents"] = $this->dse_model->get_dse_documents('pending');
		$data["all_users_arr"] = $this->generic_model->get_all_users();
		$data["c_page_title"] = "DSE Documents";
		
		$this->load->view('back_office/dse_documents', $data);
	}

	public function add_dse_lead_by_document() {

		$this->load->model("telesale_model");
		$this->load->model("generic_model");
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		if($this->input->post()){
			$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|min_length[1]');
		}
        
        if ($this->form_validation->run() != FALSE) {
        	$data = $this->input->post();
			$data["assignee"] = $this->generic_model->get_bo_to_assign_lead();
			$data["is_dsr_created"] = 0;
			$this->generic_model->add_lead_generation($data, true);
			$this->session->set_flashdata('success_msg', 'Lead has been added Successfully!');
		}

		redirect("/back-office/dse-documents");
	}

	public function delete_series($token){
		$this->db->where("export_token", $token);
		$this->db->delete("temp_export");
		redirect("/back-office/");
	}
	
	public function update_series($token){
		//echo $token."<br>";//exit;
		$this->load->model("back_office_model");
		if($this->input->post()){
			
			$tableData = stripcslashes($_POST['pTableData']);
			$tableData = json_decode($tableData,TRUE);
			$this->back_office_model->insert_update_series_from_back_office($tableData, $token);
		}
		else{
			$data["numbers"] = $this->back_office_model->get_series($token);
			$data["token"] = $token;
			$this->load->view("back_office/update", $data);
		}
	}
	
	
	public function import(){		
		$data = array();
		$token = $this->input->get("token");
		//$this->load->view("templates/header");
		$this->load->model("back_office_model");
		$data["numbers"] = $this->back_office_model->imported_data_validation($token);
		$data["token"] = $token;
		$this->load->view("back_office/import", $data);
		//$this->load->view("templates/footer");
	}
	
	public function save_imported_numbers(){
		
		$this->load->model("back_office_model");
		if($this->input->post()){
			
			$tableData = stripcslashes($_POST['pTableData']);
			$tableData = json_decode($tableData,TRUE);
			$this->back_office_model->save_imported_numbers($tableData);
		}
	}
	
	public function upload_csv(){
		//error_reporting(E_ALL);
		set_time_limit(0);
		$this->load->helper('string');
		$token = random_string('alnum', 16);
		
		$this->load->model("back_office_model");
        $this->back_office_model->import_csv($token);
		//exit;
		
        redirect("/back_office/import/?token=$token");
    }
	
	public function validate(){
		$token = $this->input->get("token");
		$this->load->model("numbers_model");
		$data["numbers"] = $this->numbers_model->get_temp_export($token);
		$this->load->view("back_office/index", $data);	
	}
	
	
}
