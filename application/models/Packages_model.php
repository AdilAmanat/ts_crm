<?php

class Packages_model extends CRM_Model {

    public function __construct() {
        parent::__construct();
    }
	
	public function get_packages($id = null){
		$packages = array();
		$this->db->select("packages.*, packages.id as package_id, users.first_name, users.last_name")->from("packages");
		$this->db->join("users", "packages.added_by = users.id");
		if(!is_null($id))
			$this->db->where("packages.id", $id);
			
		$query = $this->db->get();
		if($query->num_rows() > 0){
			if(!is_null($id)){
				$packages = $query->row_array();
				$this->db->select("*")->from("packages_detail")->where("package_id", $packages["id"]);
				$query = $this->db->get();
				$packages["details"] = array();
				if($query->num_rows() > 0){
					$packages["details"] = $query->result_array();
					/*foreach($result as $key => $row){
						$packages["details"][$key]["duration"] =
					}*/
				}
				
			}
			else{
				$packages = $query->result_array();
				foreach($packages as $key => $package){
					$this->db->select("*")->from("packages_detail")->where("package_id", $package["id"]);
					$query = $this->db->get();
					$packages[$key]["details"] = array();
					if($query->num_rows() > 0){
						$packages[$key]["details"] = $query->result_array();
					}
				}
			}
		}
		return $packages;
	}
	
	public function add($data){
		$package_duration = $data["package_duration"];
		$package_description = $data["package_description"];
		unset($data["package_duration"]);
		unset($data["package_description"]);
		$user_id = $this->session->userdata('user_id');
		
		$this->db->set("date_added", date('Y-m-d'));
		$this->db->set("added_by", $user_id);
		$this->db->insert("packages", $data);
		$package_id = $this->db->insert_id();
		
		foreach($package_duration as $key => $duration){
			$user_role_data = array(
				"package_id" => $package_id,
				"package_duration" => $duration,
				"package_description" => $package_description[$key],
			);
			$this->db->insert("packages_detail", $user_role_data);
		}		
	}
	
	
	public function edit($data, $package_id){
		$package_duration = $data["package_duration"];
		$package_description = $data["package_description"];
		unset($data["package_duration"]);
		unset($data["package_description"]);
		
		$this->db->where("id", $package_id);
		$this->db->update("packages", $data);
		
		$this->db->where("package_id", $package_id);
		$this->db->delete("packages_detail");
		
		foreach($package_duration as $key => $duration){
			$user_role_data = array(
				"package_id" => $package_id,
				"package_duration" => $duration,
				"package_description" => $package_description[$key],
			);
			$this->db->insert("packages_detail", $user_role_data);
		}
	}
	
	public function get_package_duration($id = null){
		$durations = array();
		$this->db->select("*")->from("package_duration");
		$this->db->where("is_active", 1);
		if(!is_null($id))
			$this->db->where("id", $id);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			if(!is_null($id))
				$durations = $query->row_array();
			else
				$durations = $query->result_array();
		}
		return $durations;
	}
	
	public function add_package_duration($data){
		$this->db->set("date_added", date("Y-m-d"));
		$this->db->insert("package_duration", $data);
	}
	
	public function edit_package_duration($data, $id){
		$this->db->where("id", $id);
		$this->db->update("package_duration", $data);
	}
}
