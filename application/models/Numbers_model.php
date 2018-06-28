<?php
class Numbers_model extends CRM_Model {

    public function __construct() {
        parent::__construct();
    }
	
	public function get_gernerated_history(){
		$history = array();
		$this->db->select("series_generation_history.*, users.first_name, users.last_name, data_sources.source as data_source_name");
		$this->db->from("series_generation_history");
		$this->db->order_by("series_generation_history.id", "DESC");
		$this->db->join("users", "series_generation_history.added_by = users.id");
		$this->db->join("data_sources", "series_generation_history.data_source = data_sources.id");
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$history = $query->result_array();
			foreach($history as $key => $row){
				$this->db->select("count(series_generation_history_detail.series_gen_id) as total_numbers, min(cast(series_generation_history_detail.number as unsigned)) as start_number, max(cast(series_generation_history_detail.number as unsigned)) as end_number");
				$this->db->from("series_generation_history_detail");
				$this->db->where("series_generation_history_detail.series_gen_id", $row["id"]);
				$query = $this->db->get();
				if($query->num_rows() > 0){
					$num_detail = $query->row_array();
					$history[$key]["total_numbers"] = $num_detail["total_numbers"];
					$history[$key]["start_number"] = $num_detail["start_number"];
					$history[$key]["end_number"] = $num_detail["end_number"];
					
				}	
			}
		}
		return $history;
	}
	
	public function get_gernerated_history_detail($token){
		$history = array();
		$this->db->select("series_generation_history.*, users.first_name, users.last_name, data_sources.source as data_source_name");
		$this->db->from("series_generation_history");
		$this->db->where("series_generation_history.token", $token);
		$this->db->order_by("series_generation_history.id", "DESC");
		$this->db->join("users", "series_generation_history.added_by = users.id");
		$this->db->join("data_sources", "series_generation_history.data_source = data_sources.id");
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$history = $query->row_array();
			$this->db->select("*");
			$this->db->from("series_generation_history_detail");
			$this->db->where("series_generation_history_detail.series_gen_id", $history["id"]);
			$query = $this->db->get();
			if($query->num_rows() > 0){
				$history["numbers"] = $query->result_array();
			}
			else{
				$history["numbers"] = array();
			}
		}
		//echo "<pre>"; print_r($history); echo "</pre>";
		return $history;
	}
	
	
	/*public function get_gernerated_history_old($token = NULL){
		//var_dump($token);echo "<br>";
		$history = array();
		$this->db->select("series_generation_history.*, count(series_generation_history_detail.series_gen_id) as total_numbers, users.first_name, users.last_name, min(cast(series_generation_history_detail.number as unsigned)) as start_number, max(cast(series_generation_history_detail.number as unsigned)) as end_number, data_sources.source as data_source_name");
		$this->db->from("series_generation_history");
		$this->db->order_by("series_generation_history.id", "DESC");
		if(!is_null($token))
			$this->db->where("token", $token);
		$this->db->join("series_generation_history_detail", "series_generation_history_detail.series_gen_id = series_generation_history.id");
		$this->db->join("users", "series_generation_history.added_by = users.id");
		$this->db->join("data_sources", "series_generation_history.data_source = data_sources.id");
		$query = $this->db->get();
		echo $this->db->last_query()."<br>";
		if($query->num_rows() > 0){
			if(!is_null($token)){
				$history = $query->row_array();
				$history["numbers"] = array();
				$this->db->select("*")->from("series_generation_history_detail")->where("series_gen_id", $history["id"]);
				$query = $this->db->get();
				if($query->num_rows() > 0){
					$history["numbers"] = $query->result_array();
				}
			}
			else
				$history = $query->result_array();
		}
		return $history;
		//echo "<pre>"; print_r($history); echo "</pre>";exit;
	}*/
	
	public function add_gerneration_history($tableData, $export_token){
		$this->db->select("*")->from("series_generation_history")->where("token", $export_token);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$result = $query->row_array();
			$series_gen_id = $result["id"];
		}
		else{
			$data = array();
			$data["added_by"] = $this->session->userdata('user_id');
			$data["date_added"] = date("Y-m-d");
			$data["token"] = $export_token;
			$data["data_source"] = $tableData[0]["data_source"];
			
			$this->db->insert("series_generation_history", $data);
			$series_gen_id = $this->db->insert_id();
		}
		foreach($tableData as $numberData){
			$detail = array();
			$detail["series_gen_id"] = $series_gen_id;
			$detail["number"] = $numberData["number"];
			$detail["generated_status"] = $numberData["status"];
			$this->db->insert("series_generation_history_detail", $detail);
		}
	}
	
	public function validate($numbers){
		//echo "<pre>"; print_r($numbers); echo "</pre>";
		$data = array();
		$result = array();
		$this->db->select("*")->from("numbers");
		$this->db->where_in("number", $numbers);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$result = $query->result_array();
		}
		
		$this->db->select("*")->from("temp_export");
		$this->db->where_in("number", $numbers);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$result = array_merge($result, $query->result_array());
		}
		
		//echo "Query 1: ".$this->db->last_query()."<br>";
		if(count($result) > 0){
			
			foreach($result as $row){
				if(in_array($row["number"], $numbers)){
					$found_key = array_search($row["number"],$numbers);
					$new_key = count($data);
					$data[$new_key]["number"] = $row["number"];
					$data[$new_key]["is_duplicate"] = "yes";
					$data[$new_key]["emirate_id"] = "";
					$data[$new_key]["back_ofice_status"] = "";
					unset($numbers[$found_key]);
				}
			}
			
			foreach($numbers as $num){
				$new_key = count($data);
				$data[$new_key]["number"] = $num;
				$data[$new_key]["is_duplicate"] = "no";
				$data[$new_key]["emirate_id"] = "";
				$data[$new_key]["back_ofice_status"] = "";
			}
		}
		else{
			foreach($numbers as $num){
				$new_key = count($data);
				$data[$new_key]["number"] = $num;
				$data[$new_key]["is_duplicate"] = "no";
				$data[$new_key]["emirate_id"] = "";
				$data[$new_key]["back_ofice_status"] = "";
			}
		}
		return $data;
		//echo "<pre>"; print_r($data); echo "</pre>";
	}
	
	public function inset_temp_export($tableData){
		foreach($tableData as $data){
			/*$back_ofice_status = "";
			if($data["back_ofice_status"] == ""){
				$back_ofice_status = "";
			}
			else if(strtolower($data["back_ofice_status"]) == "invalid"){
				$back_ofice_status = 0;
			}
			else if(strtolower($data["back_ofice_status"]) == "valid"){
				$back_ofice_status = 0;
			}*/
			unset($data["status"]);unset($data["data_source"]);
			$data["date_added"] = date("Y-m-d");
			$this->db->insert("temp_export", $data);
		}
		//echo $this->db->last_query()."\n\n";
	}
	
	
	
	public function get_temp_export($token, $insert){
		
		$data = array();
		$this->db->select("*")->from("temp_export")->where("export_token", $token);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$data = $query->result_array();
		}
		if($insert){
			foreach($data as $row){
				unset($row["export_token"]);
				unset($row["id"]);
				unset($row["date_added"]);
				$this->db->insert("numbers", $row);
			}
		}
		
		$this->db->where("export_token", $token);
		$this->db->delete("temp_export");
		
		return $data;
	}
	
	public function search_filter($number){
		
		$data = array();
		$this->db->select("number")->from("numbers")->where("number", $number)->group_by("number");
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$data = $query->result_array();
			
			foreach($data as $num){
				$result[] = $num["number"];
			}
			$data = $this->validate($result);
		}
		return $data;
	}
	
	
	//Code from back office model - start
	public function insert_update_series_from_back_office($tableData, $token){
		$numbers = '';
		foreach($tableData as $data){
			if($data["number"] == "")continue;
			//$record = $this->db->select("*")->from("temp_export")->where("export_token", $data["export_token"])->get()->row();
			//unset($data["export_token"]);
			//$data["back_office_status"] = 1;
			$data["date_added"] = date("Y-m-d");
			$this->db->insert("numbers", $data);

			$this->db->where("export_token", $token);
			$this->db->where("number", $data["number"]);
			$this->db->delete("temp_export");
			$numbers .= '.tr-' . $data["number"] . ',';
		}
		echo rtrim($numbers, ',');
		/*$this->db->where("export_token", $token);
		$this->db->delete("temp_export");*/
	}
	
	public function get_series($token){
		$series_data = array();
		$this->db->select("*")->from("temp_export")->where("export_token", $token)->order_by("number", "asc");
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$series_data = $query->result_array();
		}
		return $series_data;
	}
	
	public function imported_data_validation($token){
		$data = array();
		$this->db->select("*")->from("temp_export")->where("export_token", $token);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$records = $query->result_array();
			foreach($records as $record){
				//Validate Number
				$this->db->select("*")->from("numbers")->where("number", $record["number"]);
				$query_no_validarion = $this->db->get();
				//echo $this->db->last_query()."<br>";
				if($query_no_validarion->num_rows() > 0){
					//echo "number duplicate<br>";
					////Duplicate
					$new_key = count($data);
					$data[$new_key] = $record;
					$data[$new_key]["is_duplicate"] = "yes";
					$data[$new_key]["duplicate_status"] = "number duplicate";
				}
				else{//Emirate ID validation
					$this->db->select("*")->from("numbers")->where("emirate_id", $record["emirate_id"])->where("number", $record["number"]);
					$query_emirate_id = $this->db->get();
					if($query_emirate_id->num_rows() > 0){
						//echo "Emirate duplicate<br>";
						//Duplicate
						$new_key = count($data);
						$data[$new_key] = $record;
						$data[$new_key]["is_duplicate"] = "yes";
						$data[$new_key]["duplicate_status"] = "number and emirate id duplicate";
					}
					else{
						///echo "none duplicate<br>";
						$new_key = count($data);
						$data[$new_key] = $record;
						$data[$new_key]["is_duplicate"] = "no";
						
					}
				}
			}
		}
		else{			
		}
		return $data;
	}
	
	public function save_imported_numbers($tableData){
		foreach($tableData as $data){
			$data["activation_date"] = date("Y-m-d", strtotime($data["activation_date"]));
			$this->db->select("number")->from("numbers")->where("number", $data["number"]);
			$query = $this->db->get();
			if($query->num_rows() > 0){
				$this->db->where("number", $data["number"]);
				$this->db->update("numbers", $data);
			}
			else{
				$this->db->insert("numbers", $data);
			}
			
			//echo "<pre>"; print_r($data); echo "</pre>";continue;
			$token = $data["export_token"];
			//unset($data["export_token"]);
			
		}		
		$this->db->where("export_token", $token);
		$this->db->delete("temp_export");
	}
	
	public function import_csv($token){
        $count=0;
        $fp = fopen($_FILES['csv_file']['tmp_name'],'r') or die("can't open file");
		
        while($csv_line = fgetcsv($fp,1024)){
            $count++;

            for($i = 0, $j = count($csv_line); $i < $j; $i++){
				if(strtolower($csv_line[0]) == "mobile number" || $csv_line[0] == "") continue;
                $insert_csv = array();
                $insert_csv['number'] = $csv_line[0];
				$insert_csv['emirate_id'] = $csv_line[1];
				$insert_csv['package_rate_plan'] = $csv_line[2];
				$insert_csv['package_classification'] = $csv_line[3];
				$insert_csv['contract_tenure'] = $csv_line[4];
				$insert_csv['activation_date'] = date("Y-m-d", strtotime($csv_line[5]));
				$insert_csv['date_added'] = date("Y-m-d");
				$insert_csv['export_token'] = $token;

            }
            $i++;
			if(strtolower($insert_csv["number"]) == "mobile number" || $insert_csv["number"] == "")
				continue;
			$this->db->insert('temp_export', $insert_csv);
			
			$this->db->where("export_token != '$token'", NULL, false);
			$this->db->where("number", $insert_csv['number']);
			$this->db->delete("temp_export");
			//echo "Query: ".$this->db->last_query()."<br>";
        }
        fclose($fp) or die("can't close file");
    }
	
    public function import_csv_numbers(){
        
        $csvFile = file($_FILES['csv_file']['tmp_name']);
		$cols = str_getcsv($csvFile[0]);
		unset($csvFile[0]);

		$numbers = array();
		foreach ($csvFile as $key => $line) {
			// $data = array();
		    foreach (str_getcsv($line) as $k => $v) {
		    	// $data[$cols[$k]] = $v;
		    	$numbers[] = $v;
		    }
		    
		    // $this->generate_save_numbers_by_csv_series($data['series_start'], $data['series_end'], $this->input->post('data_source'));
		}
		$this->generate_save_numbers_by_csv_series($numbers, $this->input->post('data_source'), $this->input->post('tl_telesales'));
    }

    // private function generate_save_numbers_by_csv_series($series_start, $series_end, $data_source) {
    private function generate_save_numbers_by_csv_series($numbers, $data_source, $assigned_to) {
    	/*$counter = 1;
    	$tableData = array();*/
    	$export_token = substr(uniqid() . uniqid(), 0, 20);

    	foreach ($numbers as $key => $value) {
    		$insert_array = array(
								'number' => $value, 
								'back_office_status' => 1, 
								'export_token' => $export_token, 
								'gernerator_comment' => 'generated by csv', 
								'date_added' => date("Y-m-d"), 
								'assigned_to' => $assigned_to
			);
    		
			$this->db->insert("numbers", $insert_array);
    	}

		/*for($series_start; $series_start <= $series_end; $series_start++) {
			
			$temp = $series_start;
			$number = "0" . (string)$temp;

			$insert_array = array(
								'number' => $number, 
								'back_office_status' => 1, 
								'export_token' => $export_token, 
								'gernerator_comment' => 'gen by csv', 
								'date_added' => date("Y-m-d")
			);

			$this->db->insert("numbers", $insert_array);

			$tableData[] = array(
					'number' => $number, 
					'status' => 'New',
					'data_source' => $data_source,
					'export_token' => $export_token
			);
			$counter++;
		}*/

		/*$export_token = $tableData[0]["export_token"];
		$this->numbers_model->add_gerneration_history($tableData, $export_token);
		$this->numbers_model->inset_temp_export($tableData);*/
    }

	public function get_generated_series(){
		$series_data = array();
		$this->db->select("te.*, count('*') as total_numbers, te.export_token, min(cast(te.number as unsigned)) as start_number, max(cast(te.number as unsigned)) as end_number, ds.source")->from("temp_export te")->join("series_generation_history sgh", "te.export_token = sgh.token")->join("data_sources ds", "ds.id = sgh.data_source")->group_by("export_token")->order_by("te.date_added", "desc");
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$series_data = $query->result_array();
		}
		return $series_data;
	}
	
	public function assign_number($tableData){
		
		$currTime = date("Y-m-d H:i:s");
		foreach($tableData as $row){
			$data = array(
				"number_id" => $row["id"],
				"assigned_by" => $this->session->userdata('user_id'),
				"assignee" => $row["assignee"],
				"date_assigned" => $currTime,
				"is_read" => 0,
				"is_assigner_delete" => 0,
				"is_assignee_delete" => 0,
				"is_assigner_archived" => 0,
				"is_assignee_archived" => 0,
				"token" => $row["token"],
			);
			$this->db->insert("assigned_numbers", $data);
			
			$this->db->set("assigned_to", $row["assignee"]);
			$this->db->set("is_assinged_to_csr", $row["assignee"]);
			$this->db->where("id", $row["id"]);
			$this->db->update("numbers");
			//echo "<pre>"; print_r($data); echo "</pre>";
		}
	}
}
