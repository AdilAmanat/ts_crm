<?php

class Back_office_model extends CRM_Model {

    public function __construct() {
        parent::__construct();
    }
	
	
	public function get_closed_sales($user_id =  null){
		$sales = array();
		if(is_null($user_id))
			$user_id = $this->session->userdata('user_id');
		// ->where("assignee", $user_id)
		$this->db->select("telesales.id, telesales.date_updated, users.first_name, users.last_name")->from("telesales")->where("is_dsr_created", 0);
		$this->db->join("users", "users.id = telesales.assigned_by")->order_by("telesales.date_updated", "ASC");
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$sales = $query->result_array();
		}
		return $sales;
	}
	
	public function get_telesale_detail($id){
		$detail = array();
		$this->db->select("telesales.*")->from("telesales")->where("id", $id);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$detail = $query->row_array();
		}
		return $detail;
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
			$back_ofice_status = "";
			if($data["back_ofice_status"] == ""){
				$back_ofice_status = "";
			}
			else if(strtolower($data["back_ofice_status"]) == "invalid"){
				$back_ofice_status = 0;
			}
			else if(strtolower($data["back_ofice_status"]) == "valid"){
				$back_ofice_status = 0;
			}
			$data["date_added"] = date("Y-m-d");
			$this->db->insert("temp_export", $data);
		}
		//echo $this->db->last_query()."\n\n";
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
	
	
}
