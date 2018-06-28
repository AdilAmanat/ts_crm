<?php

class Users_model extends CRM_Model {

    public function __construct() {
        parent::__construct();
    }
	
	public function get_filters_dropdowns(){
		$dropdowns = array();
		$dropdowns["user_types"] = array();
		$this->db->select("*")->from("user_types");
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$dropdowns["user_types"] = $query->result_array();
		}
		
		$dropdowns["call_centers"] = array();
		$this->db->select("*")->from("call_centers");
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$dropdowns["call_centers"] = $query->result_array();
		}
		
		return $dropdowns;
	}
	
	public function get_user_types(){
		$user_type = array();
		$this->db->select("*")->from("user_types");
		$this->db->order_by("weight", "ASC");
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$user_type = $query->result_array();
		}
		return $user_type;
	}
	
	public function add($data){
		$user_type = array();
		$languages = array();
		$user_type = $data["user_type"];		
		//$languages = $data["languages"];
		unset($data["user_type"]);
		//unset($data["languages"]);
		unset($data["avatar_upload"]);
		
		if($data["avatar"] != ""){
			$data["avatar"] = $this->upload_avatar($data["avatar"]);
			$avatar = $_SERVER["DOCUMENT_ROOT"] . "/uploads/avatars/".$data["avatar"];
			$height = 100;
			$this->resize_image($avatar, $height);
		}
		
		if((in_array(5, $user_type) && !in_array(4, $user_type)) || (in_array(6, $user_type) && !in_array(10, $user_type)) || (in_array(3, $user_type) && !in_array(13, $user_type)) || (in_array(7, $user_type) && !in_array(11, $user_type))){
			if(isset($data["teamlead_agent"])){
				$teamlead_id = $data["teamlead_agent"];
				unset($data["teamlead_agent"]);
			}
			
			if(isset($data["teamlead_csr"])){
				$teamlead_id = $data["teamlead_csr"];
				unset($data["teamlead_csr"]);
			}
			
			if(isset($data["teamlead_dse"])){
				$teamlead_id = $data["teamlead_dse"];
				unset($data["teamlead_dse"]);
			}
			
			if(isset($data["teamlead_bo"])){
				$teamlead_id = $data["teamlead_bo"];
				unset($data["teamlead_bo"]);
			}
			
		}
		$this->db->set("date_added", date('Y-m-d'));
		$data["password"] = md5($data["password"]);
		$this->db->insert("users", $data);
		$user_id = $this->db->insert_id();
		
		
		
		foreach($user_type as $type){
			$user_role_data = array(
				"user_id" => $user_id,
				"role_id" => $type
			);
			$this->db->insert("users_role", $user_role_data);
		}
		
		/*foreach($languages as $language){
			$user_language_data = array(
				"user_id" => $user_id,
				"language_id" => $language
			);
			$this->db->insert("user_languages", $user_language_data);
		}*/
		
		if(in_array(5, $user_type) || in_array(6, $user_type) || in_array(7, $user_type) || in_array(3, $user_type)){
			if(in_array(4, $user_type) || in_array(10, $user_type) || in_array(11, $user_type) || in_array(13, $user_type))
				$teamlead_id = $user_id;
			$data = array();
			$data["tsa_id"] = $user_id;
			$data["teamlead_id"] = $teamlead_id;
			$this->db->insert("employees", $data);
		}
		
	}
	
	public function delete_user($id) {
		if ($id) {
			$this->db->where('id', $id);
			$deleted = $this->db->delete('users');

			$this->db->where('user_id', $id);
			$this->db->delete('users_role');

			if ($deleted) {
				return true;
			}
			return false;
		}
	}

	//Telesales agent : 5, CSR : 6, TL Agent : 4, TL CSR : 10
	public function edit($data, $user_id){
		$user_type = array();
		$languages = array();
		$user_type = $data["user_type"];		
		//$languages = $data["languages"];
		unset($data["user_type"]);
		//unset($data["languages"]);
		unset($data["avatar_upload"]);
		
		
		
		if((in_array(5, $user_type) && !in_array(4, $user_type)) || (in_array(6, $user_type) && !in_array(10, $user_type)) || (in_array(3, $user_type) && !in_array(13, $user_type)) || (in_array(7, $user_type) && !in_array(11, $user_type))){
			if(isset($data["teamlead_agent"])){
				$teamlead_id = $data["teamlead_agent"];
				unset($data["teamlead_agent"]);
			}
			
			if(isset($data["teamlead_csr"])){
				$teamlead_id = $data["teamlead_csr"];
				unset($data["teamlead_csr"]);
			}
			
			if(isset($data["teamlead_dse"])){
				$teamlead_id = $data["teamlead_dse"];
				unset($data["teamlead_dse"]);
			}
			
			if(isset($data["teamlead_bo"])){
				$teamlead_id = $data["teamlead_bo"];
				unset($data["teamlead_bo"]);
			}
			
		}
		$oldData = $this->get_user($user_id);
		//echo $data["avatar"] . " - " .$oldData["avatar"]."<br><br>";
		
		if($data["avatar"] != "" && ($oldData["avatar"] != $data["avatar"])){
			$data["avatar"] = $this->upload_avatar($data["avatar"]);
			$avatar = $_SERVER["DOCUMENT_ROOT"] . "/uploads/avatars/".$data["avatar"];
			$height = 100;
			$this->resize_image($avatar, $height);
			if(file_exists($_SERVER["DOCUMENT_ROOT"] . "/uploads/avatars/".$oldData["avatar"]))
				unlink($_SERVER["DOCUMENT_ROOT"] . "/uploads/avatars/".$oldData["avatar"]);
		}

		if(empty($data["password"]) || (md5($oldData["password"]) == md5($data["password"]))) {
			unset($data["password"]);
		}
		else {
			$data["password"] = md5($data["password"]);
		}

		$this->db->where("id", $user_id);
		$this->db->update("users", $data);
		
		$this->db->where("user_id", $user_id);
		$this->db->delete("users_role");
		foreach($user_type as $type){
			$user_role_data = array(
				"user_id" => $user_id,
				"role_id" => $type
			);
			$this->db->insert("users_role", $user_role_data);
		}
		
		/*$this->db->where("user_id", $user_id);
		$this->db->delete("user_languages");
		foreach($languages as $language){
			$user_language_data = array(
				"user_id" => $user_id,
				"language_id" => $language
			);
			$this->db->insert("user_languages", $user_language_data);
		}*/
		
		if(in_array(5, $user_type)){
			
			$data = array();
			if(in_array(4, $user_type))
				$teamlead_id = $user_id;
			$data["teamlead_id"] = $teamlead_id;
			
			$this->db->where("(tsa_id = $user_id or teamlead_id = $user_id)", NULL, FALSE);
			$this->db->from("employees");
			if($this->db->count_all_results() == 0){
				$data["tsa_id"] = $user_id;
				$this->db->insert("employees", $data);
			}
			else{
				$this->db->where("tsa_id", $user_id);
				$this->db->update("employees", $data);
			}
		}
		
		if(in_array(6, $user_type)){
			
			$data = array();
			if(in_array(10, $user_type))
				$teamlead_id = $user_id;
			$data["teamlead_id"] = $teamlead_id;
			
			$this->db->where("(tsa_id = $user_id or teamlead_id = $user_id)", NULL, FALSE);
			$this->db->from("employees");
			if($this->db->count_all_results() == 0){
				$data["tsa_id"] = $user_id;
				$this->db->insert("employees", $data);
			}
			else{
				$this->db->where("tsa_id", $user_id);
				$this->db->update("employees", $data);
			}
		}
		
		if(in_array(7, $user_type)){
			
			$data = array();
			if(in_array(11, $user_type))
				$teamlead_id = $user_id;
			$data["teamlead_id"] = $teamlead_id;
			
			$this->db->where("(tsa_id = $user_id or teamlead_id = $user_id)", NULL, FALSE);
			$this->db->from("employees");
			if($this->db->count_all_results() == 0){
				$data["tsa_id"] = $user_id;
				$this->db->insert("employees", $data);
			}
			else{
				$this->db->where("tsa_id", $user_id);
				$this->db->update("employees", $data);
			}
		}
		
		if(in_array(3, $user_type)){
			
			$data = array();
			if(in_array(13, $user_type))
				$teamlead_id = $user_id;
			$data["teamlead_id"] = $teamlead_id;
			
			$this->db->where("(tsa_id = $user_id or teamlead_id = $user_id)", NULL, FALSE);
			$this->db->from("employees");
			if($this->db->count_all_results() == 0){
				$data["tsa_id"] = $user_id;
				$this->db->insert("employees", $data);
			}
			else{
				$this->db->where("tsa_id", $user_id);
				$this->db->update("employees", $data);
			}
		}
	}
	
	public function get_user($user_id){
		$user = array();
		$this->db->select("users.*")->from("users");
		$this->db->where("id", $user_id);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$user = $query->row_array();
			
			$user["user_type"] = array();
			$this->db->select("role_id")->from("users_role")->where("user_id", $user["id"]);
			$query_role = $this->db->get();
			$roles = $query_role->result_array();
			foreach($roles as $role)
				$user["user_type"][] = $role["role_id"];
			
			//if(in_array(5, $user["user_type"]) || in_array(6, $user["user_type"]) || in_array(7, $user["user_type"]) || in_array(3, $user["user_type"])){
				$query_teamlead = $this->db->select("teamlead_id")->from("employees")->where("tsa_id", $user_id)->get();
					if($query_teamlead->num_rows() > 0){
						$user["teamlead_id"] = $query_teamlead->row()->teamlead_id;
					}
				//$user["teamlead_id"] = $this->db->select("teamlead_id")->from("employees")->where("tsa_id", $user_id)->get()->row()->teamlead_id;
			//}
			
			$user["languages"] = array();
			$this->db->select("language_id")->from("user_languages")->where("user_id", $user["id"]);
			$query_language = $this->db->get();
			$languages = $query_language->result_array();
			foreach($languages as $language)
				$user["languages"][] = $language["language_id"];
		}
		return $user;
	}
	
	
	public function get_all_users($filters = NULL){
		$users = array();
		$this->db->select("users.*")->from("users");
		if(isset($filters["username"]) && $filters["username"] != "")
			$this->db->where("username", $filters["username"]);
		if(isset($filters["call_center"]) && $filters["call_center"] != "")
			$this->db->where("call_center", $filters["call_center"]);
		if(isset($filters["privilege"]) && $filters["privilege"] != ""){
			$this->db->join("users_role", "users_role.user_id = users.id");
			$this->db->where("role_id", $filters["privilege"]);
		}
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$users = $query->result_array();
			foreach($users as $key => $user){
				$users[$key]["user_type"] = array();
				$this->db->select("role_id")->from("users_role")->where("user_id", $user["id"]);
				$query_role = $this->db->get();
				$roles = $query_role->result_array();
				foreach($roles as $role)
					$users[$key]["user_type"][] = $role["role_id"];
					
				//echo $users[$key]["id"]."<br>";var_dump($users[$key]["user_type"]);echo "<br>";
				if(in_array(5, $users[$key]["user_type"])){
					$query_teamlead = $this->db->select("teamlead_id")->from("employees")->where("tsa_id", $users[$key]["id"])->get();
					if($query_teamlead->num_rows() > 0){
						$users[$key]["teamlead_id"] = $query_teamlead->row()->teamlead_id;
					}
					//echo $this->db->last_query()."<br>";
				}
				
				$users[$key]["languages"] = array();
				$this->db->select("language_id")->from("user_languages")->where("user_id", $user["id"]);
				$query_language = $this->db->get();
				$languages = $query_language->result_array();
				foreach($languages as $language)
					$users[$key]["languages"][] = $language["language_id"];
			}
		}
		return $users;
	}

   public function login($data){
		$this->db->select("*")->from("users")->where("username", $data['username'])->where("password", md5($data['password']));
		$query = $this->db->get();
		//echo $this->db->last_query()."<br>";exit;
		if($query->num_rows() > 0){
			$user_data = $query->row_array();
			$user["user_type"] = array();
			$this->db->select("role_id")->from("users_role")->where("user_id", $user_data["id"]);
			$query_role = $this->db->get();
			$roles = $query_role->result_array();
			$user_data["user_type"] = array();
			foreach($roles as $role)
				$user_data["user_type"][] = $role["role_id"];
			
			//add all data to session
			unset($user_data["password"]);
			unset($user_data["validation_token"]);
			$newdata = array(
				'user_data' => $user_data,
				'user_id'  => $user_data['id'],
				'user_type'  => $user_data['user_type'],
				'username'  => $user_data['username'],
				'logged_in'  => TRUE,
			);
			$this->db->set('total_login', '`total_login`+ 1', FALSE);
			$this->db->set('last_login', date("Y-m-d"), FALSE);
			$this->db->where("id", $user_data["id"]);
			$this->db->update("users");
			$this->session->set_userdata($newdata);
			
			return true;
		}
		return false;
	}
	
	public function is_admin(){
		$user_data = $this->session->userdata('user_data');
        if(in_array(1, $user_data['user_type'])){
            return true;
        }
		return false;
	}
	
	public function is_generator(){
		$user_data = $this->session->userdata('user_data');
        if(in_array(2, $user_data['user_type'])){
            return true;
        }
		return false;
	}
	
	public function is_tsa(){
		$user_data = $this->session->userdata('user_data');
        if(in_array(5, $user_data['user_type'])){
            return true;
        }
		return false;
	}
	
	public function is_tl(){
		$user_data = $this->session->userdata('user_data');
        if(in_array(4, $user_data['user_type'])){
            return true;
        }
		return false;
	}
	
	public function is_tl_csr(){
		$user_data = $this->session->userdata('user_data');
        if(in_array(10, $user_data['user_type'])){
            return true;
        }
		return false;
	}
	
	public function is_tl_dse(){
		$user_data = $this->session->userdata('user_data');
        if(in_array(11, $user_data['user_type'])){
            return true;
        }
		return false;
	}
	public function is_dse(){
		$user_data = $this->session->userdata('user_data');
        if(in_array(7, $user_data['user_type'])){
            return true;
        }
		return false;
	}
	
	public function is_bl(){
		$user_data = $this->session->userdata('user_data');
        if(in_array(3, $user_data['user_type'])){
            return true;
        }
		return false;
	}
	public function is_csr(){
		$user_data = $this->session->userdata('user_data');
        if(in_array(6, $user_data['user_type'])){
            return true;
        }
		return false;
	}
	
	public function is_user_active($user_id = null) {
        if (is_null($user_id)) {
            $user_id = $this->session->userdata('user_id');
            if ($user_id == false)
                return false;
        }
        $this->db->select('is_active')->from('users')->where('is_active', 1)->where('id', $user_id);
        $query = $this->db->get();
		//echo "<pre>"; print_r($query->row_array() ); echo "</pre>";exit;
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
	
	public function get_teamleads(){
		$teamleads = array();
		$this->db->select("users.id, users.first_name, users.last_name")->from("users");
		$this->db->join("users_role", "users_role.user_id = users.id");
		$this->db->where("users_role.role_id", 4)->where("users.is_active", 1);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$teamleads = $query->result_array();
		}
		return $teamleads;
	}
	
	public function get_teamleads_csr(){
		$teamleads = array();
		$this->db->select("users.id, users.first_name, users.last_name")->from("users");
		$this->db->join("users_role", "users_role.user_id = users.id");
		$this->db->where("users_role.role_id", 10)->where("users.is_active", 1);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$teamleads = $query->result_array();
		}
		return $teamleads;
	}
	
	public function get_teamleads_bo(){
		$teamleads = array();
		$this->db->select("users.id, users.first_name, users.last_name")->from("users");
		$this->db->join("users_role", "users_role.user_id = users.id");
		$this->db->where("users_role.role_id", 13)->where("users.is_active", 1);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$teamleads = $query->result_array();
		}
		return $teamleads;
	}
	
	public function get_teamleads_dse(){
		$teamleads = array();
		$this->db->select("users.id, users.first_name, users.last_name")->from("users");
		$this->db->join("users_role", "users_role.user_id = users.id");
		$this->db->where("users_role.role_id", 11)->where("users.is_active", 1);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$teamleads = $query->result_array();
		}
		return $teamleads;
	}
	
	public function get_managers(){
		$teamleads = array();
		$this->db->select("users.id, users.first_name, users.last_name")->from("users");
		$this->db->join("users_role", "users_role.user_id = users.id");
		$this->db->where("users_role.role_id", 9)->where("users.is_active", 1);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$teamleads = $query->result_array();
		}
		return $teamleads;
	}
	
	public function upload_avatar($avatar){
		$targetFolder = '/uploads/avatars'; // Relative to the root
		if(isset($_FILES)){
			$tempFile = $_FILES['avatar_upload']['tmp_name'];
			$targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
			// Validate the file type
			//$fileTypes = array('jpg','jpeg','gif','png','JPG','JPEG','GIF','PNG'); // File extensions
			$fileParts = pathinfo($_FILES['avatar_upload']['name']);
			$filename = time() . '-avatar.' . $fileParts['extension'];
			$targetFile = rtrim($targetPath,'/') . '/' . $filename;
			//if (in_array($fileParts['extension'],$fileTypes)) {
				move_uploaded_file($tempFile,$targetFile);
				//echo $filename;
			//}
			return $filename;
		}
	}
	
	public function resize_image($image, $height){
		
		$this->load->library('image_lib');
        $size = getimagesize($image);
        $resize_width = ($size[0] * $height) / $size[1];
        $resize = true;
        if ($size[1] < $height) {
            $resize = false;
        }
		
		//$path = $_SERVER['DOCUMENT_ROOT'] . '/uploads/images';
        //$pathTemp = '/uploads/images';

        $configSize1['image_library'] = 'gd2';
        $configSize1['source_image'] = $image;
        $configSize1['create_thumb'] = FALSE;
        $configSize1['maintain_ratio'] = TRUE;
        $configSize1['width'] = $resize_width;
        $configSize1['height'] = $height;
        $configSize1['quality'] = 70;
		if ($resize) {
			$configSize1['new_image'] =  $image;
			$this->image_lib->clear();
			$this->image_lib->initialize($configSize1);
			$this->image_lib->resize();
		}
		
	}

	public function get_recent_leads() {
		$data = array();
		$user_id = $this->session->userdata('user_id');

		$this->db->select("tl.id")->from("telesales_logs AS tl");
		$this->db->where("tl.assignee", $user_id);
		$this->db->group_by("tl.id");
		$query = $this->db->get();

		if($query->num_rows() > 0) {
			$ids_arr = $query->result_array();
			$temp_ids_arr = array();
			foreach ($ids_arr as $key => $value) {
				$temp_ids_arr[] = $value['id'];
			}

			$this->db->select("ts.*")->from("telesales AS ts");
			$this->db->where_in("ts.id", $temp_ids_arr);
			$this->db->order_by("ts.date_updated", "ASC");
			$query = $this->db->get();

			if($query->num_rows() > 0) {
				$data = $query->result_array();
			}
		}
		return $data;
	}

	public function get_teammember_by_type($type_id)
    {
    	$this->db->select("users.*,users_role.role_id,t.target_value")->from("users");
    	$this->db->join("users_role", "users_role.user_id = users.id",'inner');
    	$this->db->join("targets as t", "users.id = t.user_id",'left');
    	$this->db->where("role_id", $type_id);
    	$query = $this->db->get();
    	$data = $query->result_array();
    	return $data;
    }
    
}
