<?php

class Reports_model extends CRM_Model {

    public function __construct() {
        parent::__construct();
    }
	
	public function get_filters_dropdowns(){
		$dropdowns = array();
		$dropdowns["csrs"] = array();
		$this->db->select("users.first_name, users.last_name, users.id")->from("users");
		$this->db->where("users_role.role_id", 6);
		$this->db->where("users.is_active", 1);
		$this->db->join("users_role", "users_role.user_id = users.id");
		$query = $this->db->get();
		//echo $this->db->last_query()."<br>";
		if($query->num_rows() > 0){
			$dropdowns["csrs"] = $query->result_array();
		}
		
		$dropdowns["promo_devices"] = array();
		$this->db->select("*")->from("promo_devices");
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$dropdowns["promo_devices"] = $query->result_array();
		}
		
		$dropdowns["kiosks"] = array();
		$this->db->select("*")->from("kiosks");
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$dropdowns["kiosks"] = $query->result_array();
		}
		
		$dropdowns["sales_manager"] = array();
		$this->db->select("users.first_name, users.last_name, users.id")->from("users");
		$this->db->where("users_role.role_id", 8);
		$this->db->where("users.is_active", 1);
		$this->db->join("users_role", "users_role.user_id = users.id");
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$dropdowns["sales_manager"] = $query->result_array();
		}
		
		$dropdowns["tsas"] = array();
		$this->db->select("users.first_name, users.last_name, users.id")->from("users");
		$this->db->where("users_role.role_id", 5);
		$this->db->where("users.is_active", 1);
		$this->db->join("users_role", "users_role.user_id = users.id");
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$dropdowns["tsas"] = $query->result_array();
		}
		
		$dropdowns["teamleads"] = array();
		$this->db->select("users.first_name, users.last_name, users.id")->from("users");
		$this->db->where("users_role.role_id", 4);
		$this->db->where("users.is_active", 1);
		$this->db->join("users_role", "users_role.user_id = users.id");
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$dropdowns["teamleads"] = $query->result_array();
		}
		
		$dropdowns["package_classifications"] = array();
		$this->db->select("*")->from("package_classifications");
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$dropdowns["package_classifications"] = $query->result_array();
		}
		
		$dropdowns["packages"] = array();
		$this->db->select("*")->from("packages");
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$dropdowns["packages"] = $query->result_array();
		}
		
		$dropdowns["lead_classifications"] = array();
		$this->db->select("*")->from("lead_classifications");
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$dropdowns["lead_classifications"] = $query->result_array();
		}
		
		$dropdowns["documents"] = array();
		$this->db->select("*")->from("documents");
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$dropdowns["documents"] = $query->result_array();
		}
		
		$dropdowns["cities"] = array();
		$this->db->select("*")->from("cities");
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$dropdowns["cities"] = $query->result_array();
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
		
		$dropdowns["call_centers"] = array();
		$this->db->select("*")->from("call_centers");
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$dropdowns["call_centers"] = $query->result_array();
		}
		
		//echo "<pre>"; print_r($dropdowns); echo "</pre>";
		return $dropdowns;		
	}
}
