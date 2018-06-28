<?php

class Optimized_model extends CRM_Model {

    public function __construct() {
        parent::__construct();
    }
	
	public function add($data){
		if($data["user_type"] == '5'){
			$teamlead_id = $data["teamlead_id"];
			unset($data["teamlead_id"]);
		}
		$this->db->set("date_added", date('Y-m-d'));
		$data["password"] = md5($data["password"]);
		$this->db->insert("users", $data);
		$user_id = $this->db->insert_id();
		
		if($data["user_type"] == '5'){
			$data = array();
			$data["tsa_id"] = $user_id;
			$data["teamlead_id"] = $teamlead_id;
			$this->db->insert("employees", $data);
		}
		
	}
	
	public function get_user($user_id){
		$user = array();
		$this->db->select("*")->from("users");
		$this->db->where("id", $user_id);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$user = $query->row_array();
			if($user["user_type"] == 5){
				$user["teamlead_id"] = $this->db->select("teamlead_id")->from("employees")->where("tsa_id", $user["id"])->get()->row()->teamlead_id;
			}
		}
		return $user;
	}
	
	public function edit($data, $user_id){
		if($data["user_type"] == '5'){
			$teamlead_id = $data["teamlead_id"];
			unset($data["teamlead_id"]);
		}
		$oldData = $this->get_user($user_id);
		if(md5($oldData["password"]) == md5($data["password"]))
			unset($data["password"]);
		else
			$data["password"] = md5($data["password"]);
		$this->db->where("id", $user_id);
		$this->db->update("users", $data);
		if($data["user_type"] == '5'){
			$data = array();
			$data["teamlead_id"] = $teamlead_id;
			$this->db->where("tsa_id", $user_id);
			$this->db->update("employees", $data);
		}
	}
	
	public function get_all_users(){
		$users = array();
		$this->db->select("*")->from("users");
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$users = $query->result_array();
			foreach($users as $key => $user){
				if($user["user_type"] == 5){
					$users[$key]["teamlead_id"] = $this->db->select("teamlead_id")->from("employees")->where("tsa_id", $user["id"])->get()->row()->teamlead_id;
				}
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
        if($user_data['user_type']!=1){
            return false;
        }
		return true;
	}
	
	public function is_generator(){
		$user_data = $this->session->userdata('user_data');
        if($user_data['user_type']!=2){
            return false;
        }
		return true;
	}
	
	public function is_tsa(){
		$user_data = $this->session->userdata('user_data');
        if($user_data['user_type']!=5){
            return false;
        }
		return true;
	}
	
	public function is_tl(){
		$user_data = $this->session->userdata('user_data');
        if($user_data['user_type']!=4){
            return false;
        }
		return true;
	}
	
	public function is_bl(){
		$user_data = $this->session->userdata('user_data');
        if($user_data['user_type']!=3){
            return false;
        }
		return true;
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
		$this->db->select("id, first_name, last_name")->from("users")->where("user_type", 4)->where("is_active", 1);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$teamleads = $query->result_array();
		}
		return $teamleads;
	}
}
