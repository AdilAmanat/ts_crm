<?php

class Content_model extends CRM_Model {

    public function __construct() {
        parent::__construct();
    }
	
	public function get_notifications(){
		
		$user_data = $this->session->userdata('user_data');
		//echo "<pre>"; print_r($user_data); echo "</pre>";exit;
		if(in_array(1, $user_data['user_type'])){
			return "";
		}
		if(in_array(2, $user_data['user_type'])){
			return "";
		}
		if(in_array(3, $user_data['user_type'])){
			return "";
		}
		if(in_array(4, $user_data['user_type'])){
			return $this->get_tl_agent_notifications();
		}
		if(in_array(10, $user_data['user_type'])){
			return $this->get_tl_csr_notifications();
		}
		if(in_array(5, $user_data['user_type'])){
			return $this->get_tsa_notifications();
		}
		if(in_array(6, $user_data['user_type'])){
			return $this->get_csr_notifications();
		}
	}
	
	public function get_tl_csr_notifications(){
		$notifications = array();
		$notifications["assign_notifications"] = array();
		$notifications["telesale_notifications"] = array();
		
		$user_id = $this->session->userdata('user_id');
		
		$this->db->select("assigned_numbers.token, assigned_numbers.date_assigned, users.first_name as assinger_first_name, users.last_name as assinger_last_name, count(assigned_numbers.id) as total_numbers")->from("assigned_numbers");
		$this->db->where("assigned_numbers.assignee", $user_id);
		$this->db->where("assigned_numbers.is_read", 0);
		$this->db->where("assigned_numbers.is_telesale_created", 0);
		$this->db->where("assigned_numbers.is_processed", 0);
		$this->db->join("users", "users.id = assigned_numbers.assigned_by");
		$this->db->group_by("assigned_numbers.token");
		$this->db->group_by("assigned_numbers.assigned_by");
		$this->db->group_by("assigned_numbers.date_assigned");
		$this->db->order_by("assigned_numbers.date_assigned", "DESC");
		
		$query = $this->db->get();
		//echo $this->db->last_query()."<br>";
		
		if($query->num_rows() > 0){
			$tsa_notification = $query->result_array();			
			foreach($tsa_notification as $notification){
				$notifications["assign_notifications"][] = '<a class="notification-anchor" href="/teamlead-csr/view-assigned/'.$notification["token"].'/'.strtotime($notification["date_assigned"]).'/">'.$notification["assinger_first_name"] ." ". $notification["assinger_last_name"] ." has assigned you ". $notification["total_numbers"] ." number(s) at ".date("d F, Y, H:i A", strtotime($notification["date_assigned"])).'</a>';
			}
		}
		
		$this->db->select("telesales.id, telesales.date_updated, users.first_name as assinger_first_name, users.last_name as assinger_last_name")->from("telesales");
		/*$this->db->where("assignee", $user_id);
		$this->db->where("is_teamlead_csr_read", 0);*/
		$this->db->where("((assignee = $user_id and is_teamlead_csr_read = 0))", NULL, FALSE);/* or (csr = $user_id and is_teamlead_csr_read = 0)*/
		$this->db->join("users", "users.id = telesales.assigned_by");
		
		$query = $this->db->get();
		//echo $this->db->last_query()."<br>";
		if($query->num_rows() > 0){
			$tsa_notification = $query->result_array();
			foreach($tsa_notification as $notification){
				$notifications["telesale_notifications"][] = '<a class="notification-anchor" href="/teamlead-csr/view-assigned-telesales/'.$notification["id"].'/">'.$notification["assinger_first_name"] ." ". $notification["assinger_last_name"] ." has assigned you lead at ".date("d F, Y, H:i A", strtotime($notification["date_updated"])).'</a>';
			}
		}
		
		$all_notifications["notifications"] = array_merge($notifications["assign_notifications"] , $notifications["telesale_notifications"]);
		
		//echo "<pre>"; print_r($all_notifications); echo "</pre>";
		return $all_notifications;
	}
	public function get_tl_agent_notifications(){
		$notifications = array();
		$notifications["assign_notifications"] = array();
		$notifications["telesale_notifications"] = array();
		
		$user_id = $this->session->userdata('user_id');
		
		$this->db->select("assigned_numbers.date_assigned, assigned_numbers.id, assigned_numbers.number_id, assigned_numbers.token, users.first_name as assinger_first_name, users.last_name as assinger_last_name, count(assigned_numbers.id) as total_numbers")->from("assigned_numbers");
		$this->db->where("assigned_numbers.assignee", $user_id);
		$this->db->where("assigned_numbers.is_read", 0);
		$this->db->where("assigned_numbers.is_telesale_created", 0);
		$this->db->where("assigned_numbers.is_processed", 0);
		$this->db->join("users", "users.id = assigned_numbers.assigned_by");
		$this->db->group_by("assigned_numbers.token");
		$this->db->group_by("assigned_numbers.assigned_by");
		$this->db->group_by("assigned_numbers.date_assigned");
		$this->db->order_by("assigned_numbers.date_assigned", "DESC");
		
		$query = $this->db->get();
		//echo $this->db->last_query()."<br>";
		
		
		if($query->num_rows() > 0){
			$tsa_notification = $query->result_array();
			//echo "<pre>"; print_r($tsa_notification); echo "</pre>";		
			foreach($tsa_notification as $notification){
				$notifications["assign_notifications"][] = '<a class="notification-anchor" href="/teamlead-agent/view-assigned/'.$notification["token"].'/'.strtotime($notification["date_assigned"]).'/">'.$notification["assinger_first_name"] ." ". $notification["assinger_last_name"] ." has assigned you ". $notification["total_numbers"] ." number(s) at ".date("d F, Y, H:i A", strtotime($notification["date_assigned"])).'</a>';
			}
		}
		
		$this->db->select("telesales.date_updated, telesales.id, users.first_name as assinger_first_name, users.last_name as assinger_last_name")->from("telesales");
		/*$this->db->where("assignee", $user_id);
		$this->db->where("is_teamlead_agent_read", 0);*/
		$this->db->where("((assignee = $user_id and is_teamlead_agent_read = 0) )", NULL, FALSE);/*or (csr = $user_id and is_teamlead_agent_read = 0)*/
		$this->db->join("users", "users.id = telesales.assigned_by");
		
		$query = $this->db->get();
		//echo $this->db->last_query()."<br>";
		if($query->num_rows() > 0){
			$tsa_notification = $query->result_array();
			foreach($tsa_notification as $notification){
				$notifications["telesale_notifications"][] = '<a class="notification-anchor" href="/teamlead-agent/view-assigned-telesales/'.$notification["id"].'/">'.$notification["assinger_first_name"] ." ". $notification["assinger_last_name"] ." has assigned you lead at ".date("d F, Y, H:i A", strtotime($notification["date_updated"])).'</a>';
			}
		}
		
		$all_notifications["notifications"] = array_merge($notifications["assign_notifications"] , $notifications["telesale_notifications"]);
		
		//echo "<pre>"; print_r($all_notifications); echo "</pre>";
		return $all_notifications;
	}
	
	public function get_tsa_notifications(){
		$notifications = array();
		$notifications["assign_notifications"] = array();
		$notifications["telesale_notifications"] = array();
		
		$user_id = $this->session->userdata('user_id');
		
		$this->db->select("assigned_numbers.date_assigned, assigned_numbers.token, users.first_name as assinger_first_name, users.last_name as assinger_last_name, count(assigned_numbers.id) as total_numbers")->from("assigned_numbers");
		$this->db->where("assigned_numbers.assignee", $user_id);
		$this->db->where("assigned_numbers.is_read", 0);
		$this->db->where("assigned_numbers.is_telesale_created", 0);
		$this->db->where("assigned_numbers.is_processed", 0);
		$this->db->join("users", "users.id = assigned_numbers.assigned_by");
		$this->db->group_by("assigned_numbers.token");
		$this->db->group_by("assigned_numbers.assigned_by");
		$this->db->group_by("assigned_numbers.date_assigned");
		$this->db->order_by("assigned_numbers.date_assigned", "DESC");
		
		$query = $this->db->get();
		//echo $this->db->last_query()."<br>";
		if($query->num_rows() > 0){
			$tsa_notification = $query->result_array();
			foreach($tsa_notification as $notification){
				//$notifications["assign_notifications"][] = $notification["assinger_first_name"] ." ". $notification["assinger_last_name"] ." has assigned you ". $notification["total_numbers"] ." leads at ".date("d F, Y, H:i A", strtotime($notification["date_assigned"]));
				$notifications["assign_notifications"][] = '<a class="notification-anchor" href="/telesale/update/'.$notification["token"].'/'.strtotime($notification["date_assigned"]).'/">'.$notification["assinger_first_name"] ." ". $notification["assinger_last_name"] ." has assigned you ". $notification["total_numbers"] ." number(s) at ".date("d F, Y, H:i A", strtotime($notification["date_assigned"])).'</a>';
			}
		}
		//echo "<pre>"; print_r($notifications); echo "</pre>";
		$this->db->select("telesales.id, telesales.date_updated, users.first_name as assinger_first_name, users.last_name as assinger_last_name")->from("telesales");
		/*$this->db->where("assignee", $user_id);
		$this->db->where("is_teamlead_csr_read", 0);*/
		$this->db->where("((assignee = $user_id and is_tsa_read = 0) )", NULL, FALSE);/*or (tsa = $user_id and is_tsa_read = 0)*/
		$this->db->join("users", "users.id = telesales.assigned_by");
		
		$query = $this->db->get();
		//echo $this->db->last_query()."<br>";
		if($query->num_rows() > 0){
			$tsa_notification = $query->result_array();
			foreach($tsa_notification as $notification){
				$notifications["telesale_notifications"][] = '<a class="notification-anchor" href="/teamlead-csr/view-assigned-telesales/'.$notification["id"].'/">'.$notification["assinger_first_name"] ." ". $notification["assinger_last_name"] ." has assigned you lead at ".date("d F, Y, H:i A", strtotime($notification["date_updated"])).'</a>';
			}
		}
		
		$all_notifications["notifications"] = array_merge($notifications["assign_notifications"] , $notifications["telesale_notifications"]);
		return $all_notifications;
	}
	
	public function get_csr_notifications(){
		$notifications = array();
		$notifications["assign_notifications"] = array();
		$notifications["telesale_notifications"] = array();
		
		$user_id = $this->session->userdata('user_id');
		
		$this->db->select("assigned_numbers.date_assigned, users.first_name as assinger_first_name, users.last_name as assinger_last_name, count(assigned_numbers.id) as total_numbers")->from("assigned_numbers");
		$this->db->where("assigned_numbers.assignee", $user_id);
		$this->db->where("assigned_numbers.is_read", 0);
		$this->db->where("assigned_numbers.is_telesale_created", 0);
		$this->db->where("assigned_numbers.is_processed", 0);
		$this->db->join("users", "users.id = assigned_numbers.assigned_by");
		$this->db->group_by("assigned_numbers.token");
		$this->db->group_by("assigned_numbers.assigned_by");
		$this->db->group_by("assigned_numbers.date_assigned");
		$this->db->order_by("assigned_numbers.date_assigned", "DESC");
		
		$query = $this->db->get();
		//echo $this->db->last_query()."<br>";
		if($query->num_rows() > 0){
			$tsa_notification = $query->result_array();
			//echo "<pre>"; print_r($tsa_notification); echo "</pre>";
			foreach($tsa_notification as $notification){
				$notifications["assign_notifications"][] = "<a class='notification-anchor' href='" . site_url() . "csr/assigned-telesales/" . "'>" . $notification["assinger_first_name"] ." ". $notification["assinger_last_name"] ." has assigned you ". $notification["total_numbers"] ." number(s) at ".date("d F, Y, H:i A", strtotime($notification["date_assigned"])) . "</a>";
			}
		}
		
		$this->db->select("telesales.date_updated, users.first_name as assinger_first_name, users.last_name as assinger_last_name")->from("telesales");
		$this->db->where("((assignee = $user_id and is_csr_read = 0) )", NULL, FALSE);
		//$this->db->where("is_csr_read", 0);
		$this->db->join("users", "users.id = telesales.assigned_by");
		
		$query = $this->db->get();
		//echo $this->db->last_query()."<br>";
		if($query->num_rows() > 0){
			$tsa_notification = $query->result_array();
			//echo "<pre>"; print_r($tsa_notification); echo "</pre>";
			foreach($tsa_notification as $notification){
				$notifications["telesale_notifications"][] = "<a class='notification-anchor' href='" . site_url() . "csr/assigned-telesales/" . "'>" . $notification["assinger_first_name"] ." ". $notification["assinger_last_name"] ." has assigned you lead at ".date("d F, Y, H:i A", strtotime($notification["date_updated"])) . "</a>";
			}
		}
		
		$all_notifications["notifications"] = array_merge($notifications["assign_notifications"] , $notifications["telesale_notifications"]);
		return $all_notifications;
	}
	
	public function get_all_notifications($user_id = NULL, $user_type = NULL){
		
		$notifications = array();
		$notifications["assign_notifications"] = array();
		$notifications["telesale_notifications"] = array();
		
		if(is_null($user_id))
			$user_id = $this->session->userdata('user_id');
		
		$this->db->select("assigned_numbers.date_assigned, users.first_name as assinger_first_name, users.last_name as assinger_last_name, count(assigned_numbers.id) as total_numbers")->from("assigned_numbers");
		$this->db->where("assigned_numbers.assignee", $user_id);
		//$this->db->where("assigned_numbers.is_read", 0);
		$this->db->where("assigned_numbers.is_telesale_created", 0);
		//$this->db->where("assigned_numbers.is_processed", 0);
		$this->db->join("users", "users.id = assigned_numbers.assigned_by");
		$this->db->group_by("assigned_numbers.token");
		$this->db->group_by("assigned_numbers.assigned_by");
		$this->db->group_by("assigned_numbers.date_assigned");
		$this->db->order_by("assigned_numbers.date_assigned", "DESC");
		
		$query = $this->db->get();
		//echo $this->db->last_query()."<br>";
		if($query->num_rows() > 0){
			$tsa_notification = $query->result_array();
			foreach($tsa_notification as $notification){
				$notifications["assign_notifications"][] = $notification["assinger_first_name"] ." ". $notification["assinger_last_name"] ." has assigned you ". $notification["total_numbers"] ." number(s) at ".date("d F, Y, H:i A", strtotime($notification["date_assigned"]));
			}
		}
		
		$this->db->select("telesales.date_updated, users.first_name as assinger_first_name, users.last_name as assinger_last_name")->from("telesales");
		$this->db->where("assignee", $user_id);
		if(!is_null($user_type)){
			if($user_type == "tl_agent")
				$this->db->where("is_teamlead_agent_read", 0);
			if($user_type == "tl_csr")
				$this->db->where("is_teamlead_csr_read", 0);
			if($user_type == "csr")
				$this->db->where("is_csr_read", 0);
			if($user_type == "tsa")
				$this->db->where("is_tsa_read", 0);
		}
		$this->db->join("users", "users.id = telesales.assigned_by");
		
		$query = $this->db->get();
		//echo $this->db->last_query()."<br>";
		if($query->num_rows() > 0){
			$tsa_notification = $query->result_array();
			foreach($tsa_notification as $notification){
				$notifications["telesale_notifications"][] = $notification["assinger_first_name"] ." ". $notification["assinger_last_name"] ." has assigned you lead at ".date("d F, Y, H:i A", strtotime($notification["date_updated"]));
			}
		}
		
		$all_notifications["notifications"] = array_merge($notifications["assign_notifications"] , $notifications["telesale_notifications"]);
		//echo "<pre>"; print_r($all_notifications); echo "</pre>";
		return $all_notifications;
		
	}
}
