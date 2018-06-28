<?php

class Telesale_model extends CRM_Model {

    public function __construct() {
        parent::__construct();
    }
	
	public function get_dropdowns_telesales(){
		$dropdowns = array();
		$dropdowns["csrs"] = array();
		$this->db->select("users.first_name, users.last_name, users.id, call_centers.name as call_center_name")->from("users");
		$this->db->where("users_role.role_id", 6);
		$this->db->where("users.is_active", 1);
		$this->db->join("users_role", "users_role.user_id = users.id");
		$this->db->join("call_centers", "call_centers.id = users.call_center");
		$query = $this->db->get();
		//echo $this->db->last_query()."<br>";
		if($query->num_rows() > 0){
			$dropdowns["csrs"] = $query->result_array();
		}
		
		$dropdowns["tsas"] = array();
		$this->db->select("users.first_name, users.last_name, users.id, call_centers.name as call_center_name")->from("users");
		$this->db->where("users_role.role_id", 5);
		$this->db->where("users.is_active", 1);
		$this->db->join("users_role", "users_role.user_id = users.id");
		$this->db->join("call_centers", "call_centers.id = users.call_center");
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$dropdowns["tsas"] = $query->result_array();
		}
		
		$dropdowns["call_centers"] = array();
		$this->db->select("*")->from("call_centers");
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$dropdowns["call_centers"] = $query->result_array();
		}
		
		$dropdowns["cities"] = array();
		$this->db->select("*")->from("cities");
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$dropdowns["cities"] = $query->result_array();
		}
		$dropdowns["packages"] = array();
		$this->db->select("*")->from("packages");
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$dropdowns["packages"] = $query->result_array();
		}
		
		$dropdowns["promo_devices"] = array();
		$this->db->select("*")->from("promo_devices");
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$dropdowns["promo_devices"] = $query->result_array();
		}
		$dropdowns["handset_types"] = array();
		$this->db->select("*")->from("handset_types");
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$dropdowns["handset_types"] = $query->result_array();
		}
		$dropdowns["handset_models"] = array();
		$this->db->select("*")->from("handset_models");
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$dropdowns["handset_models"] = $query->result_array();
		}
		
		$dropdowns["handset_colors"] = array();
		$this->db->select("*")->from("handset_colors");
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$dropdowns["handset_colors"] = $query->result_array();
		}
		
		//echo "<pre>"; print_r($dropdowns); echo "<pre>";
		
		return $dropdowns;
	}
	
	/*public function get_team_members(){
		$team = array();
		
		$user_id = $this->session->userdata('user_id');
		$this->db->select("employees.*, users.*")->From("employees")->where("employees.teamlead_id", $user_id);
		$this->db->join("users", "employees.tsa_id = users.id");
		
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$team = $query->result_array();
		}
		return $team;
		
	}*/
	
	public function get_assigned_numbers_by_series($export_token, $timestamp = NULL){
		$numbers = array();
		$user_id = $this->session->userdata('user_id');
		$this->db->select("assigned_numbers.*, numbers.number")->from("assigned_numbers");
		$this->db->where("token", $export_token);
		$this->db->where("assignee",$user_id);
		$this->db->where("is_processed",0);
		$this->db->join("numbers", "numbers.id = assigned_numbers.number_id");
		if(!is_null($timestamp))
			$this->db->where("date_assigned", date("Y-m-d H:i:s", $timestamp));
		//$this->db->group_by("export_token");
		$query = $this->db->get();
		//echo $this->db->last_query()."<br>";
		if($query->num_rows() > 0){
			$numbers = $query->result_array();
			$this->db->set("is_read", 1);
			$this->db->where("token", $export_token);
			$this->db->where("assignee",$user_id);
			$this->db->where("is_processed",0);
			if(!is_null($timestamp))
				$this->db->where("date_assigned", date("Y-m-d H:i:s", $timestamp));
			$this->db->update("assigned_numbers");
			//echo $this->db->last_query()."<br>";
		}
		return $numbers;
	}
	
	public function get_assigned_series(){
		$numbers = array();
		$user_id = $this->session->userdata('user_id');
		$this->db->select("assigned_numbers.*, count('*') as total_numbers, numbers.export_token, min(cast(numbers.number as unsigned)) as start_number, max(cast(numbers.number as unsigned)) as end_number")->from("assigned_numbers");
		$this->db->where("assigned_numbers.assignee",$user_id);
		$this->db->where("is_processed", 0);
		$this->db->join("numbers", "numbers.id = assigned_numbers.number_id");
		$this->db->group_by("assigned_numbers.date_assigned");
		$this->db->group_by("assigned_numbers.token");
		
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$numbers = $query->result_array();
		}
		//echo $this->db->last_query()."<br>";
		//echo "<pre>"; print_r($numbers); echo "</pre>";
		return $numbers;
	}
	
	
	
	/*public function get_assigned_numbers(){
		$records = array();
		$user_id = $this->session->userdata('user_id');
		$this->db->select("assigned_numbers.*, numbers.*, numbers.id as num_id")->from("assigned_numbers");
		$this->db->join("numbers", "numbers.id = assigned_numbers.number_id");
		$this->db->where("assigned_numbers.agent_id", $user_id);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$records = $query->result_array();
		}
		return $records;
		
	}*/
	
	public function get_teamlead_id($user_id = NULL){
		$teamlead_id = NULL;
		if(is_null($user_id))
			$user_id = $this->session->userdata('user_id');
		
		$this->db->select("teamlead_id")->from("employees")->where("tsa_id", $user_id);
		$query = $this->db->get();
		if($query->num_rows() >0){
			$teamlead_id = $query->row()->teamlead_id;
		}
		return $teamlead_id;
	}
	//public function update_status($number_id, $status){
	public function update_status($data){
		//echo "<pre>"; print_r($data); echo "</pre>"; //return;
		$user_id = $this->session->userdata('user_id');
		/*$data = array(
			"tsa_id" => $user_id,
			"number_id" => $number_id,
			"feedback" => $status,
			"date_added" => date("Y-m-d"),
		);
		
		$this->db->insert("tsa_feedbacks", $data);*/
		$teamlead_id = $this->get_teamlead_id($user_id);
		
		$status = array(
			"number_id" => $data["id"],
			"assigned_by" => $user_id,
			"date_assigned" => date("Y-m-d H:i:s"),
			"assignee" => $teamlead_id,
			"token" => $data["token"],
			"comment" => $data["comment"],
			"status" => $data["status"],
			"date_update" => date("Y-m-d H:i:s"),
		);
		
		//echo "<pre>"; print_r($status); echo "</pre>";
		
		$this->db->insert("assigned_numbers", $status);
		
		$status = array(
			"is_processed" => 1,			
		);
		$this->db->where("id", $data["assign_no_id"]);
		$this->db->update("assigned_numbers", $status);
		
		$this->db->set("assigned_to",$teamlead_id);
		$this->db->set("is_assinged_to_csr",$teamlead_id);
		$this->db->where("id", $data["id"]);
		$this->db->update("numbers");
		
		/*$this->db->where("agent_id", $user_id);
		$this->db->where("number_id", $number_id);
		$this->db->delete("assigned_numbers");*/
		//echo $this->db->last_query()."\n\n";
	}
	
	public function get_tsa_status(){
		$tsa_status = array();
		$this->db->select("*")->from("tsa_status");
		$this->db->where("is_active", 1);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$tsa_status = $query->result_array();
		}
		return $tsa_status;
	}
}
