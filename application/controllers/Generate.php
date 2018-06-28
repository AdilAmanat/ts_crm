<?php
class Generate extends Generator_Controller {

    function __construct() {
        parent::__construct();
    
	}	
	public function index(){		
		$data = array();
		$data['js_includes'][] = '/assets/plugins/charts-c3/js/c3.min.js';
		$data['js_includes'][] = '/assets/plugins/charts-c3/js/d3.v3.min.js';
		$data['css_includes'][] = '/assets/plugins/charts-c3/plugin.css';		
		$this->load->view("generator/dashboard", $data);
	}
	
	public function generate_series(){

		$this->load->model('generic_model');
		$data = array();
		$data['css_includes'][] = "http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css";
		$this->load->model("numbers_model");
		$data["series"] = $this->numbers_model->get_generated_series();
		$data["data_sources"] = $this->generic_model->get_all_data_sources();
		$this->load->view("generator/index", $data);
	}
	
	public function import_numbers_csv() {

		$this->load->model('generic_model');
		$data = array();
		$data['css_includes'][] = "http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css";
		$this->load->model("numbers_model");
		$data["data_sources"] = $this->generic_model->get_all_data_sources();
		$data["tl_telesales"] = $this->generic_model->get_tl_telesales();
		$this->load->view("generator/import_numbers_csv", $data);
	}

	public function validation(){
		$data = array();
		$data['css_includes'][] = "http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css";
		$data['c_page_title'] = "Ready for validation";
		
		$this->load->model("numbers_model");
		$data["series"] = $this->numbers_model->get_generated_series();
		$this->load->view("generator/validation", $data);
	}

	//Actions from Back office controller - start
	public function delete_series($token){
		$this->db->where("export_token", $token);
		$this->db->delete("temp_export");
		redirect("/generate/validation/");
	}
	
	public function update_series($token){
		
		$this->load->model("numbers_model");
		$this->load->model("generic_model");
		if($this->input->post()){
			
			$tableData = stripcslashes($_POST['pTableData']);
			$tableData = json_decode($tableData,TRUE);
			$this->numbers_model->insert_update_series_from_back_office($tableData, $token);
		}
		else{
			$data["numbers"] = $this->numbers_model->get_series($token);
			$data["token"] = $token;
			$data["tl_telesales"] = $this->generic_model->get_tl_telesales();
			$this->load->view("generator/update", $data);
		}
	}
	
	
	public function import(){		
		$data = array();
		$token = $this->input->get("token");
		//$this->load->view("templates/header");
		$this->load->model("numbers_model");
		$data["numbers"] = $this->numbers_model->imported_data_validation($token);
		$data["token"] = $token;
		$this->load->view("generator/import", $data);
		//$this->load->view("templates/footer");
	}
	
	public function save_imported_numbers(){
		
		$this->load->model("numbers_model");
		if($this->input->post()){
			
			$tableData = stripcslashes($_POST['pTableData']);
			$tableData = json_decode($tableData,TRUE);
			$this->numbers_model->save_imported_numbers($tableData);
		}
	}
	
	public function upload_csv(){
		//error_reporting(E_ALL);
		set_time_limit(0);
		$this->load->helper('string');
		$token = random_string('alnum', 16);
		
		$this->load->model("numbers_model");
        $this->numbers_model->import_csv($token);
		//exit;
		
        redirect("/generate/import/?token=$token");
    }
	
	public function validate(){
		$token = $this->input->get("token");
		$this->load->model("numbers_model");
		$data["numbers"] = $this->numbers_model->get_temp_export($token);
		$this->load->view("generator/index", $data);	
	}
	
	//Actions from Back office controller - End
	
	
	
	public function generate_numbers(){
		$data = array();
		$data["numbers"] = array();
		$this->load->model("generic_model");
		$data["data_sources"] = $this->generic_model->get_all_data_sources();
		$data["filters"] = $this->input->get();
		$series_start = $data["filters"]["series_start"];
		$series_end = $data["filters"]["series_end"];
		$order_type = $data["filters"]["order_type"];
		//$sequence = $data["filters"]["sequence"];
		$total_no = $data["filters"]["total_no"];
		
		$series_start_temp = intval($series_start);
		$series_end_temp = intval($series_end);
		$total_no_temp = intval($total_no);
		
		
		if($series_start != "" && $series_end != ""){
			$series_start = intval($series_start);
			$series_end   = intval($series_end);
			
			$counter = 1;
			for($series_start; $series_start <= $series_end; $series_start++){
				if($order_type != ""){
					if($order_type == "odd"){
						if($series_start  % 2 == 0)
							continue;
					}
					if($order_type == "even"){
						if($series_start  % 2 != 0)
							continue;
					}
				}
				
				$temp = $series_start;
				$data["numbers"][] = "0" .(string)$temp;
				
				if($total_no != "" && (intval($total_no) == $counter)){
					break;
				}
				$counter++;
			}
		}
		
		else if($series_start != "" && $series_end == "" && $total_no != ""){
			//echo "total_no_temp : $total_no_temp - order_type : $order_type<br>";
			//var_dump($total_no_temp);
			//echo "<br><br><br>";

			for($i = 0; $i < $total_no_temp; $i++){
				//echo " i = $i - ";
				if($order_type != ""){
					if($order_type == "odd"){
						if($series_start_temp  % 2 == 0){
							//echo "Continue odd - ";
							$series_start_temp++;
							$total_no_temp++;
							continue;
						}
					}
					if($order_type == "even"){
						if($series_start_temp  % 2 != 0){
							//echo "Continue even - ";
							$series_start_temp++;
							$total_no_temp++;
							continue;
						}
					}
				}
				//echo "<br>";
				//echo "$series_start_temp - ";
				$temp = $series_start_temp;
				$data["numbers"][] = "0" .(string)$temp;				
				$series_start_temp++;
			}
			
		}
		$numbers = $data["numbers"];
		unset($data["numbers"]);
		$this->load->model("numbers_model");
		$data["numbers"] = $this->numbers_model->validate($numbers);
		//echo "Total Numbers: ".count($data["numbers"])."<br><br>";
		$this->load->view("generator/index", $data);
	}
	
	public function update_numbers(){
		
		$this->load->model("numbers_model");
		$tableData = stripcslashes($_POST['pTableData']);
		$tableData = json_decode($tableData,TRUE);
		//echo "<pre>"; print_r($tableData); echo "</pre>\n";return;
		$export_token = $tableData[0]["export_token"];//export_token
		$this->numbers_model->add_gerneration_history($tableData, $export_token);
		$this->numbers_model->inset_temp_export($tableData);
	}
	
	/*public function save_series(){
		$this->load->model("numbers_model");
		if(isset($_GET["status"]) && $_GET["status"] == "completed"){			
			$data = array();
			$token = $_GET["token"];
			$data = $this->numbers_model->get_temp_new_series($token);
		}
	}*/
	
	public function upload_csv_numbers(){
		set_time_limit(0);
		
		$this->load->model("numbers_model");
        $this->numbers_model->import_csv_numbers();

		$this->session->set_flashdata('success_msg', 'Numbers imported Successfully');
        redirect("/generate/import-numbers-csv");
    }

	public function upload_data(){
		set_time_limit(0);
		$this->load->helper('string');
		$token = random_string('alnum', 16);
		
		$this->load->model("numbers_model");
        $this->numbers_model->import_csv($token);
        redirect("/back_office/validate/?token=$token");
    }
	
	public function reports(){
		$this->load->model("reports_model");
		$data["dropdowns"] = $this->reports_model->get_filters_dropdowns();
		$this->load->view("generator/reports", $data);
	}
	
	public function history(){
		$data = array();
		$this->load->model("numbers_model");
		$data["history"] = $this->numbers_model->get_gernerated_history($token = null);
		//echo "<pre>"; print_r($data["history"]); echo "</pre>";
		$this->load->view("generator/history", $data);
	}
	
	public function history_detail(){
		$data = array();
		$this->load->model("numbers_model");
		$token = $this->input->get("token");
		$data["history"] = $this->numbers_model->get_gernerated_history_detail($token);
		//echo "<pre>"; print_r($data["history"]); echo "</pre>";
		$this->load->view("generator/history_detail", $data);
	}
	
}
