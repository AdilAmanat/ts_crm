<?php

class Teamlead_csr_model extends CRM_Model {

    public function __construct() {
        parent::__construct();
    }
	
	public function get_numbers_assigned_by_tl_agent(){
		$numbers = array();
		$user_id = $this->session->userdata('user_id');
		$this->db->select("assigned_numbers.*, count('*') as total_numbers, numbers.export_token, min(cast(numbers.number as unsigned)) as start_number, max(cast(numbers.number as unsigned)) as end_number, users.first_name as assigned_by_first_name, users.last_name as assigned_by_last_name")->from("assigned_numbers");
		$this->db->where("assigned_numbers.assignee",$user_id);
		$this->db->where("is_processed", 0);
		$this->db->where("users_role.role_id", 4);
		$this->db->join("users", "users.id = assigned_numbers.assigned_by");
		$this->db->join("users_role", "users_role.user_id = assigned_numbers.assigned_by");
		$this->db->join("numbers", "numbers.id = assigned_numbers.number_id");
		//$this->db->join("tsa_status", "tsa_status.id = assigned_numbers.status");
		$this->db->group_by("assigned_numbers.date_assigned");
		$this->db->group_by("assigned_numbers.token");
		
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$numbers = $query->result_array();
		}
		//echo $this->db->last_query()."<br>";
		//echo "<pre>"; print_r($numbers); echo "</pre>";exit;
		return $numbers;
	}
	
	public function get_numbers_assigned_by_csr(){
		$numbers = array();
		$user_id = $this->session->userdata('user_id');
		$this->db->select("assigned_numbers.*, count('*') as total_numbers, numbers.export_token, min(cast(numbers.number as unsigned)) as start_number, max(cast(numbers.number as unsigned)) as end_number, users.first_name as assigned_by_first_name, users.last_name as assigned_by_last_name, csr_status.status")->from("assigned_numbers");
		$this->db->where("assigned_numbers.assignee",$user_id);
		$this->db->where("is_processed", 0);
		$this->db->where("users_role.role_id", 6);
		$this->db->where("assigned_numbers.is_closed", 0);
		$this->db->join("users", "users.id = assigned_numbers.assigned_by");
		$this->db->join("users_role", "users_role.user_id = assigned_numbers.assigned_by");
		$this->db->join("numbers", "numbers.id = assigned_numbers.number_id");
		$this->db->join("csr_status", "csr_status.id = assigned_numbers.csr_status");
		$this->db->group_by("assigned_numbers.date_assigned");
		$this->db->group_by("assigned_numbers.token");
		
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$numbers = $query->result_array();
		}
		//echo $this->db->last_query()."<br>";
		//echo "<pre>"; print_r($numbers); echo "</pre>";exit;
		return $numbers;
	}
	
	public function get_assigned_numbers_by_series($export_token, $timestamp/*, $assgined_by*/){
		$numbers = array();
		$user_id = $this->session->userdata('user_id');
		$this->db->select("assigned_numbers.*, numbers.number, users.first_name as assigned_by_first_name, users.last_name as assigned_by_last_name")->from("assigned_numbers");
		$this->db->where("token", $export_token);
		$this->db->where("assignee",$user_id);
		$this->db->where("is_processed",0);
		$this->db->join("numbers", "numbers.id = assigned_numbers.number_id");
		$this->db->join("users", "users.id = assigned_numbers.assigned_by");
		//$this->db->join("tsa_status", "tsa_status.id = assigned_numbers.status");
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
		}
		//echo "<pre>"; print_r($numbers); echo "</pre>";
		return $numbers;
	}
	
	public function get_number_detail($number_id, $id){
		$user_id = $this->session->userdata('user_id');
		$this->db->select("*")->from("assigned_numbers");
		$this->db->where("assignee", $user_id);
		$this->db->where("is_processed",0);
		$this->db->where("number_id",$number_id);
		$this->db->where("id",$id);
		if($this->db->count_all_results() == 0)
			redirect("/");
		
		$detail = array();
		$this->db->select("assigned_numbers.*, users.first_name as assignee_first_name, users.last_name as assignee_last_name, numbers.number")->from("assigned_numbers");
		$this->db->where("assigned_numbers.number_id", $number_id);
		$this->db->where("(assigned_numbers.id <= $id)", NULL, FALSE);
		$this->db->join("users", "users.id = assigned_numbers.assignee");
		$this->db->join("numbers", "numbers.id = assigned_numbers.number_id");
		$query = $this->db->get();
		//echo $this->db->last_query()."<br><br>";
		if($query->num_rows() > 0){
			$detail = $query->result_array();
			foreach($detail as $key => $row){
				$detail[$key]["status_name"] = "";
				if($row["status"] != ""){
					$this->db->select("status as status_name")->from("tsa_status")->where("id", $row["status"]);
					$detail[$key]["status_name"] = $this->db->get()->row()->status_name;
				}
				$this->db->select("users.first_name as assigned_by_first_name, users.last_name as assigned_by_last_name")->from("users");
				$this->db->where("id", $row["assigned_by"]);
				$result = $this->db->get()->row();
				$detail[$key]["assigned_by_first_name"] = $result->assigned_by_first_name;
				$detail[$key]["assigned_by_last_name"] = $result->assigned_by_last_name;
			}
			
			//$detail = $result;
		}
		return $detail;
		//echo "<pre>"; print_r($detail); echo "</pre>";exit;
	}
	
	public function get_team_members(){
		$team = array();
		$user_id = $this->session->userdata('user_id');
		$this->db->select("employees.*, users.*, (select count(*) from numbers where numbers.assigned_to = users.id) as total_numbers")->From("employees")->where("employees.teamlead_id", $user_id);
		$this->db->join("users", "employees.tsa_id = users.id");
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$team = $query->result_array();
		}
		return $team;
		
	}
	//--------------------------functions from teamlead agent controllers----------------------------
	
	public function assign_number($id, $assign_to, $comment){
		
		$user_id = $this->session->userdata('user_id');
		$this->db->select("*")->from("assigned_numbers");
		$this->db->where("assignee", $user_id);
		$this->db->where("is_processed",0);
		$this->db->where("id",$id);
		if($this->db->count_all_results() == 0)
			redirect("/");
			
		$this->db->select("*")->from("assigned_numbers")->where("id", $id);
		$query = $this->db->get();
		$number_detail = $query->row_array();
		
		
		unset($number_detail["id"]);
		unset($number_detail["status"]);
		$number_detail["assigned_by"] = $user_id;
		$number_detail["assignee"] = $assign_to;
		$number_detail["date_assigned"] = date("Y-m-d H:i:s");
		$number_detail["is_processed"] = 0;
		$number_detail["comment"] = $comment;		
		$this->db->insert("assigned_numbers", $number_detail);
		
		$data = array(
			"date_update" => date("Y-m-d H:i:s"),
			"is_processed" => 1
		);
		$this->db->where("id", $id);
		$this->db->update("assigned_numbers", $data);
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
		
		//echo "<pre>"; print_r($dropdowns); echo "<pre>";
		
		return $dropdowns;
	}
	
	
	
	public function get_tl_agents(){
		$csrs = array();
		$this->db->select("users.first_name, users.last_name, users.id, call_centers.name as call_center_name")->from("users");
		$this->db->where("users_role.role_id", 4);
		$this->db->where("users.is_active", 1);
		$this->db->join("users_role", "users_role.user_id = users.id");
		$this->db->join("call_centers", "call_centers.id = users.call_center");
		$query = $this->db->get();
		//echo $this->db->last_query()."<br>";
		if($query->num_rows() > 0){
			$csrs = $query->result_array();
		}
		return $csrs;
	}
	
	public function get_team_member_numbers($tsa_id){
		if(!$this->is_my_team_member($tsa_id))
			redirect($_SERVER["HTTP_REFERER"]);
		$numbers = array();
		$this->db->select("numbers.number, (select count(*) from tsa_feedbacks where number_id = numbers.id and tsa_id = $tsa_id) as feedback")->from("numbers")->where("assigned_to", $tsa_id);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$numbers = $query->result_array();
		}
		return $numbers;
	}
	
	public function is_my_team_member($tsa_id){
		$user_id = $this->session->userdata('user_id');
		$this->db->where("teamlead_id", $user_id);
		$this->db->where("tsa_id", $tsa_id);
		$this->db->from("employees");
		if($this->db->count_all_results() > 0)
			return true;
		return false;
	}
	
	public function get_dropdowns_content(){
		$data = array();
		$data["package_rate_plans"] = array();
		$data["package_classifications"] = array();
		$data["contract_tenures"] = array();
		
		$package_rate_plans = $this->db->select("distinct(package_rate_plan)")->from("numbers")->where("package_rate_plan != ''", NULL, FALSE)->order_by("package_rate_plan")->get()->result_array();
		$package_classifications = $this->db->select("distinct(package_classification)")->from("numbers")->where("package_classification != ''", NULL, FALSE)->order_by("package_classification")->get()->result_array();
		$contract_tenures = $this->db->select("distinct(contract_tenure)")->from("numbers")->where("contract_tenure != ''", NULL, FALSE)->order_by("contract_tenure")->get()->result_array();
		$call_status = $this->db->select("distinct(feedback)")->from("tsa_feedbacks")->where("feedback != ''", NULL, FALSE)->order_by("feedback")->get()->result_array();
		$csr_status = $this->db->select("status, id")->from("csr_status")->order_by("status")->get()->result_array();
		//echo "<pre>"; print_r($csr_status); echo "</pre>";
		$data["csr_status"] = array();
		$data["call_status"] = array();
		$data["package_rate_plans"] = array();
		$data["package_classifications"] = array();
		$data["contract_tenures"] = array();
		foreach($csr_status as $key => $status){
			$newKey = count($data["csr_status"]);
			$data["csr_status"][$key]["status"] = $status["status"];
			$data["csr_status"][$key]["id"] = $status["id"];
			
		}
		foreach($call_status as $status)
			$data["call_status"][] = $status["feedback"];
		
		foreach($package_rate_plans as $package_rate_plan)
			$data["package_rate_plans"][] = $package_rate_plan["package_rate_plan"];
		
		foreach($package_classifications as $package_classification)
			$data["package_classifications"][] = $package_classification["package_classification"];
		
		foreach($contract_tenures as $contract_tenure)
			$data["contract_tenures"][] = $contract_tenure["contract_tenure"];
		//echo "<pre>"; print_r($data["csr_status"]); echo "</pre>";
		return $data;
	}
	
	public function search($filters){
		
		if($filters["activation_date_from"] != ""){
			$activation_date_from = explode("/", $filters["activation_date_from"]);
			$filters["activation_date_from"] = $activation_date_from[2] . "-" . $activation_date_from[0] ."-". $activation_date_from[1];
		}
		if($filters["activation_date_till"] != ""){
			$activation_date_till = explode("/", $filters["activation_date_till"]);
			$filters["activation_date_till"] = $activation_date_till[2] . "-" . $activation_date_till[0] ."-". $activation_date_till[1];
		}
		$records = array();
		
		$this->db->select("numbers.*, numbers.id as no_id")->from("numbers");
		if((isset($filters["series_start"]) && $filters["series_start"] != "" ) && (isset($filters["series_end"]) && $filters["series_end"] != "" )){
			$this->db->where("cast(number as unsigned) between ".$filters["series_start"]." and ".$filters["series_end"], NULL, FALSE);
		}
		elseif((isset($filters["series_start"]) && $filters["series_start"] != "" ) && (isset($filters["series_end"]) && $filters["series_end"] == "" )){
			$this->db->where("cast(number as unsigned) >= ".$filters["series_start"] ,NULL, FALSE );
		}
		
		if((isset($filters["activation_date_from"]) && $filters["activation_date_from"] != "" ) && (isset($filters["activation_date_till"]) && $filters["activation_date_till"] != "" )){
			$this->db->where("activation_date between ".$filters["activation_date_from"]." and ".$filters["activation_date_till"], NULL, FALSE);
		}
		elseif((isset($filters["activation_date_from"]) && $filters["activation_date_from"] != "" ) && (isset($filters["activation_date_till"]) && $filters["activation_date_till"] == "" )){
			$this->db->where("activation_date >= ".$filters["activation_date_from"] ,NULL, FALSE );
		}
		
		if(isset($filters["emirates_id"]) && $filters["emirates_id"] != "" ){
			$this->db->where("emirate_id", $filters["emirates_id"]);
		}
		
		if(isset($filters["call_status"]) && $filters["call_status"] != "" ){
			$this->db->where("tsa_feedbacks.feedback", $filters["call_status"]);
			$this->db->group_by("tsa_feedbacks.number_id");
			$this->db->join("tsa_feedbacks", "tsa_feedbacks.number_id = numbers.id");
			//$this->db->where("emirate_id", $filters["emirates_id"]);
		}
		
		if(isset($filters["csr_status"]) && $filters["csr_status"] != "" ){
			$this->db->where("csr_feedbacks.feedback", $filters["csr_status"]);
			$this->db->group_by("csr_feedbacks.number_id");
			$this->db->join("csr_feedbacks", "csr_feedbacks.number_id = numbers.id");
			//$this->db->where("emirate_id", $filters["emirates_id"]);
		}
		
		if(isset($filters["package_rate_plan"]) && $filters["package_rate_plan"] != "" ){
			$this->db->where("package_rate_plan", $filters["package_rate_plan"]);
		}
		
		if(isset($filters["package_classification"]) && $filters["package_classification"] != "" ){
			$this->db->where("package_classification", $filters["package_classification"]);
		}
		
		if(isset($filters["contract_tenure"]) && $filters["contract_tenure"] != "" ){
			$this->db->where("contract_tenure", $filters["contract_tenure"]);
		}
		
		if(isset($filters["total_no"]) && $filters["total_no"] != "" ){
			$this->db->limit($filters["total_no"]);
		}
		
		$this->db->where("numbers.back_office_status", 1);
		//$this->db->where("assigned_numbers.number_id IS NULL", NULL, FALSE);
		$this->db->where("(assigned_to is null or assigned_to = '')", null, false);
		//$this->db->join("assigned_numbers", "assigned_numbers.number_id = numbers.id", "LEFT OUTER");
		
		$query = $this->db->get();
		//echo $this->db->last_query()."<br><br>";
		
		if($query->num_rows() > 0){
			$records = $query->result_array();
		}
		return $records;
	}
	
	//Not in use - > new function numbers model assign_number()
	public function assign_numbers_to_individual($tableData){
		
		/*foreach($tableData as $row){
			$data = array(
				"number_id" => $row["id"],
				"agent_id" => $row["tsa_id"],
			);
			$this->db->insert("assigned_numbers", $data);
		}*/
		foreach($tableData as $row){
			$this->db->set("assigned_to", $row["tsa_id"]);
			$this->db->set("is_assinged_to_csr", $row["tsa_id"]);
			$this->db->where("id", $row["id"]);
			$this->db->update("numbers");
		}
	}
	
	public function get_unassigned_series_without_feedbacks(){
		$numbers = array();
		$this->db->select("numbers.*, count('*') as total_numbers, export_token, min(cast(number as unsigned)) as start_number, max(cast(number as unsigned)) as end_number")->where("back_office_status", 1)->from("numbers");
		$this->db->where("(assigned_to is null or assigned_to = '')", null, false);
		$this->db->where("tsa_feedbacks.number_id is null", null, false);
		$this->db->join("tsa_feedbacks", "tsa_feedbacks.number_id = numbers.id", "LEFT OUTER");
		$this->db->group_by("export_token");
		$query = $this->db->get();
		//echo $this->db->last_query()."<br>";
		if($query->num_rows() > 0){
			$numbers = $query->result_array();
		}
		return $numbers;
	}
	
	public function get_unassigned_series_with_feedbacks(){
		$numbers = array();
		/*$this->db->select("numbers.*, count('*') as total_numbers, numbers.export_token, min(cast(numbers.number as unsigned)) as start_number, max(cast(numbers.number as unsigned)) as end_number")->where("numbers.back_office_status", 1)->from("numbers");
		$this->db->where("(assigned_to is null or assigned_to = '')", null, false);
		$this->db->where("(tsa_feedbacks.id is not null)", null, false);
		$this->db->join("tsa_feedbacks", "tsa_feedbacks.number_id = numbers.id");
		$this->db->group_by("export_token");*/
		$query = $this->db->query("SELECT `numbers`.*, count('*') as total_numbers, `numbers`.`export_token`, min(cast(numbers.number as unsigned)) as start_number, max(cast(numbers.number as unsigned)) as end_number FROM `numbers` LEFT JOIN (select * from tsa_feedbacks GROUP BY tsa_feedbacks.number_id order by tsa_feedbacks.date_added) as b ON `b`.`number_id` = `numbers`.`id` WHERE `numbers`.`back_office_status` = 1 AND (assigned_to is null or assigned_to = '') AND (b.id is not null) GROUP BY `export_token`");
		//$numbers = $query->result_array();
		//$query = $this->db->get();
		if($query->num_rows() > 0){
			$numbers = $query->result_array();
		}
		return $numbers;
	}
	
	public function get_unassigned_numbers_from_series_with_feedback($export_token){
		$numbers = array();
		$this->db->select("numbers.*, numbers.id as no_id")->from("numbers");
		$this->db->where("(assigned_to is null or assigned_to = '')", null, false);
		$this->db->where("export_token", $export_token)->where("back_office_status", 1);
		$this->db->where("(tsa_feedbacks.id is not null)", null, false);
		$this->db->order_by("cast(numbers.number as unsigned)", "asc");
		$this->db->order_by("tsa_feedbacks.date_added", "asc");
		$this->db->group_by("tsa_feedbacks.number_id");
		$this->db->join("tsa_feedbacks", "tsa_feedbacks.number_id = numbers.id");
		//$this->db->group_by("export_token");
		$query = $this->db->get();
		//echo $this->db->last_query()."<br>";
		if($query->num_rows() > 0){
			$numbers = $query->result_array();
			
			foreach($numbers as $key => $number){
				$numbers[$key]["feedbacks"] = array();
				//echo "<pre>"; print_r($number); echo "</pre>";
				$this->db->select("*")->from("tsa_feedbacks")->where("number_id", $number["no_id"])->order_by("date_added", "desc");
				$query = $this->db->get();
				if($query->num_rows() > 0){
					$numbers[$key]["feedbacks"] = $query->result_array();
				}
			}
		}
		return $numbers;
	}
	
	public function get_unassigned_numbers_from_series_without_feedback($export_token){
		$numbers = array();
		$this->db->select("numbers.*, numbers.id as no_id")->from("numbers");
		$this->db->where("(assigned_to is null or assigned_to = '')", null, false);
		$this->db->where("export_token", $export_token)->where("back_office_status", 1);
		$this->db->where("(tsa_feedbacks.id is null)", null, false);
		$this->db->order_by("cast(number as unsigned)", "asc");
		$this->db->join("tsa_feedbacks", "tsa_feedbacks.number_id = numbers.id", "LEFT OUTER");
		//$this->db->group_by("export_token");
		$query = $this->db->get();
		//echo $this->db->last_query()."<br>";
		if($query->num_rows() > 0){
			$numbers = $query->result_array();
		}
		return $numbers;
	}
	
	public function get_csr(){
		$csr = array();
		$this->db->select("users.*")->From("users")->where("users_role.role_id", 6);
		$this->db->join("users_role", "users_role.user_id = users.id");
		
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$csr = $query->result_array();
		}
		return $csr;
	}
}
