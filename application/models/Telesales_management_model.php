<?php

class Telesales_management_model extends CRM_Model {

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
		
		return $dropdowns;
	}
}
