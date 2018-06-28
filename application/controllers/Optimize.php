<?php

class Optimize extends CI_Controller {

    function __construct() {
        parent::__construct();
    }
	
	public function index(){		
		$data = array();

		$this->load->view("home/index", $data);
	}
	
	public function get_package_detail(){
		$this->load->model("daily_sales_model");
		$package_id = $this->input->post("package_id");
		$detail = $this->daily_sales_model->get_package_detail($package_id);
		echo json_encode($detail);
	}
	
	
	
	public function generate_numbers(){
		error_reporting(E_ALL);
		//echo "Generate Numbers<br>";
		$data = array();
		$data["numbers"] = array();
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
		$this->load->view("home/index", $data);
	}
	
	public function update_numbers(){
		
		$this->load->model("numbers_model");
		$tableData = stripcslashes($_POST['pTableData']);
		$tableData = json_decode($tableData,TRUE);
		$this->numbers_model->inset_temp_export($tableData);
	}
	
	
	public function export_csv(){
		error_reporting(E_ALL);
		
		$this->load->model("numbers_model");
		if(isset($_GET["status"]) && $_GET["status"] == "completed"){			
			$data = array();
			$token = $_GET["token"];
			if($_GET["update"] == "true")
				$insert = true;
			else
				$insert = false;
			$data = $this->numbers_model->get_temp_export($token, $insert);
			
			header("Content-type: application/csv");
            header("Content-Disposition: attachment; filename=\"test".".csv\"");
            header("Pragma: no-cache");
            header("Expires: 0");
			$handle = fopen('php://output', 'w');
			
			if(count($data) > 0){
				foreach ($data as $data) {
					unset($data["id"]);
					unset($data["export_token"]);
					unset($data["date_added"]);
                fputcsv($handle, $data);
				}
					fclose($handle);
				exit;
			}
		}		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	public function export_excel(){
		
		$this->load->model("numbers_model");
		if(isset($_GET["status"]) && $_GET["status"] == "completed"){
			
			$data = array();
			$token = $_GET["token"];
			$token = $_GET["token"];
			if($_GET["update"] == "true")
				$insert = true;
			else
				$insert = false;
			$data = $this->numbers_model->get_temp_export($token, $insert);
			
			header("Pragma: public");
			header("Expires: 0");
			header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
			header("Content-Type: application/force-download");
			header("Content-Type: application/octet-stream");
			header("Content-Type: application/download");
			header("Content-Disposition: attachment;filename=list.xls");
			header("Content-Transfer-Encoding: binary ");
			
			
			$content = '<table style="border:#ccc thin solid;">';
			if(count($data) > 0){
				$content .= '<thead>';
				$content .= '<tr>';
				$content .= '<th>Number</th>';
				$content .= '<th>Emirate ID</th>';
				$content .= '<th>Status</th>';
				$content .= '</tr>';
				$content .= '</thead>';
				$content .= '<tbody>';
				foreach($data as $key => $num){
					$content .= '<tr>';
					$content .= '<td>'.$num["number"] .'</td>';
					$content .= '<td>'.$num["emirate_id"].'</td>';
					$content .= '<td>'.$num["status"].'</td>';
					$content .= '</tr>';
				}
				$content .= '</tbody>';
			}
			else{
				$content .= '<tr><td>No Records Found</td></tr>';
			}
			$content .= '</table>';		
			print($content);
			exit;
		}		
	}
	
	public function excel_import(){
		//echo "<pre>"; print_r( $_FILES); echo "</pre><br><br><br>";
		$file = $_FILES["excel_file_name"]["tmp_name"];
		//echo "<pre>"; print_r($file); echo "</pre>";// exit;
		$file_open = fopen($file,"r");
		
		$count = 0;
		while(($csv = fgetcsv($file_open, 1000, ",")) !== false){
			 //echo "<pre>"; print_r($csv); echo "</pre>";
			 echo $csv[0];// ." - ". $csv[1] ." - ".$csv[2];//."<br>";
			 //if($count == 10) exit;
			 //$count++;
		}
		exit;
	}
	
	
	
	
}
