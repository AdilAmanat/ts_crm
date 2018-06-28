<?php

class Numbers_model extends CRM_Model {

    public function __construct() {
        parent::__construct();
    }
	
	public function validate($numbers){
		//echo "<pre>"; print_r($numbers); echo "</pre>";
		$data = array();
		$this->db->select("*")->from("numbers");
		$this->db->where_in("number", $numbers);
		$query = $this->db->get();
		//echo $this->db->last_query()."<br>";
		if($query->num_rows() > 0){
			$result = $query->result_array();
			
			foreach($result as $row){
				if(in_array($row["number"], $numbers)){
					$found_key = array_search($row["number"],$numbers);
					$new_key = count($data);
					$data[$new_key]["number"] = $row["number"];
					$data[$new_key]["is_duplicate"] = "yes";
					$data[$new_key]["emirate_id"] = "";
					$data[$new_key]["status"] = "";
					unset($numbers[$found_key]);
				}
			}
			
			foreach($numbers as $num){
				$new_key = count($data);
				$data[$new_key]["number"] = $num;
				$data[$new_key]["is_duplicate"] = "no";
				$data[$new_key]["emirate_id"] = "";
				$data[$new_key]["status"] = "";
			}
		}
		else{
			foreach($numbers as $num){
				$new_key = count($data);
				$data[$new_key]["number"] = $num;
				$data[$new_key]["is_duplicate"] = "no";
				$data[$new_key]["emirate_id"] = "";
				$data[$new_key]["status"] = "";
			}
		}
		return $data;
		//echo "<pre>"; print_r($data); echo "</pre>";
	}
	
	public function inset_temp_export($tableData){
		foreach($tableData as $data){
			$data["date_added"] = date("Y-m-d");
			$this->db->insert("temp_export", $data);
		}
		//echo $this->db->last_query()."\n\n";
	}
	
	
	
	public function get_temp_export($token){
		
		$data = array();
		$this->db->select("*")->from("temp_export")->where("export_token", $token);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$data = $query->result_array();
		}
		
		foreach($data as $row){
			unset($row["export_token"]);
			unset($row["id"]);
			unset($row["date_added"]);
			$this->db->insert("numbers", $row);
		}
		
		//$this->db->where("export_token", $token);
		//$this->db->delete("temp_export");
		
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
	
	public function import_csv($token){
        $count=0;
		//echo "<pre>"; print_r($_FILES); echo "<pre>";
        $fp = fopen($_FILES['csv_file']['tmp_name'],'r') or die("can't open file");
		
        while($csv_line = fgetcsv($fp,1024)){
			//echo "<pre>"; print_r($csv_line); echo "</pre>";
            $count++;
            if($count == 1){
                continue;
            }//keep this if condition if you want to remove the first row
			//continue;
            for($i = 0, $j = count($csv_line); $i < $j; $i++){
                $insert_csv = array();
                $insert_csv['number'] = $csv_line[0];
				$insert_csv['status'] = $csv_line[2];

            }
            $i++;
            $data = array(
                'number' => $insert_csv['number'],
                'status' => $insert_csv['status'],
				"export_token" => $token,
				"date_added" => date("Y-m-d")
			);
            //$data['crane_features'] = $this->db->insert('numbers', $data);
			$this->db->insert('temp_export', $data);
        }
        fclose($fp) or die("can't close file");
        $data['success']="success";
        return $data;
    }
}
