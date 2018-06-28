<?php

class Generic_model extends CRM_Model {

    public function __construct() {
        parent::__construct();
    }
	
	public function get_package_selected_detail($package_id){
		return $this->db->select("*")->from("packages_detail")->where("package_id", $package_id)->get()->result_array();
	}
	
	public function get_telesale_detail($id, $type = NULL){
		$detail = array();
		$this->db->select("telesales.*")->from("telesales")->where("id", $id);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$detail = $query->row_array();

			// load documents
			/*$this->db->select("td.document_file_name, td.title")->from("telesales_documents td")->where("td.telesales_id", $id);
			$query = $this->db->get();
			if($query->num_rows() > 0){
				$detail['telesales_documents'] = $query->result_array();
			}*/

			// load logs
			$this->db->select("*")->from("telesales_logs tl")->where("tl.id", $id);
			$query = $this->db->get();
			if($query->num_rows() > 0){
				$detail['all_users'] = $this->get_all_users(1, true);
				$detail['telesales_logs'] = $query->result_array();
			}

			if(!is_null($type)){
				if($type == "tl_agent")
					$this->db->set("is_teamlead_agent_read", 1);
				if($type == "tl_csr")
					$this->db->set("is_teamlead_csr_read", 1);
				if($type == "csr")
					$this->db->set("is_csr_read", 1);
				if($type == "tsa")
					$this->db->set("is_tsa_read", 1);
				
				$this->db->where("id", $id);
				$this->db->update("telesales");
				//echo "Update Read Notification: ".$this->db->last_query()."<br><br>";
			}
		}
		//echo "<pre>"; print_r($detail); echo "</pre>";
		return $detail;
	}
	public function get_assigned_telesales($user_id = NULL){
		if(is_null($user_id))
			$user_id = $this->session->userdata('user_id');
		$telesales = array();
		$this->db->select("telesales.id, telesales.date_updated, users.first_name, users.last_name")->from("telesales")->where("assignee", $user_id);
		$this->db->join("users", "users.id = telesales.assigned_by")->order_by("telesales.date_updated", "ASC");
		$query = $this->db->get();
		//echo $this->db->last_query()."<br>";
		if($query->num_rows() > 0){
			$telesales = $query->result_array();
		}
		
		return $telesales;
	}
	public function add_lead_generation($data, $dse = false){
		$user_id = $this->session->userdata('user_id');
		$teamlead_id = $this->get_teamlead_id($user_id);
		if(isset($data["assigned_numbers_id"])){
			$assigned_numbers_id = $data["assigned_numbers_id"];
			//unset($data["assigned_numbers_id"]);
			$newData = array(
				"is_processed" => 1,
				"is_telesale_created" => 1,
				"telesale_created_by" => $user_id,
				"date_update" => date("Y-m-d H:i:s"),
				//"assignee" => $teamlead_id,
				//"assigned_by" => $user_id,
			);
			$this->db->where("id", $assigned_numbers_id);
			$this->db->update("assigned_numbers", $newData);
		}

		if (!$dse) {
			$data["assignee"] = $teamlead_id;
			$data["assigned_by"] = $user_id;
			$data["tl_agent"] = $teamlead_id;
			$data["tsa"] = $user_id;
		}

		$data["added_by"] = $user_id;
		$data["date_added"] = date("Y-m-d H:i:s");
		$data["date_updated"] = date("Y-m-d H:i:s");

		if(isset($data['telesales_documents'])) {
			$telesales_documents = $data['telesales_documents'];
			unset($data['telesales_documents']);
		}
		if(isset($data['telesales_call_recording'])) {
			$telesales_call_recording = $data['telesales_call_recording'];
			unset($data['telesales_call_recording']);
		}

		$this->db->insert("telesales", $data);
		$telesales_id = $this->db->insert_id();
		
		// $base_path = str_replace('/', '\\', FCPATH);
		$base_path = realpath(".");

		/* documents */
		if(isset($telesales_documents) && count($telesales_documents)) {
			$upload_path = $base_path . '/uploads/telesales_documents/' . $telesales_id;

			if (!is_dir($base_path . '/uploads/telesales_documents')) {
				mkdir($base_path . '/uploads/telesales_documents');
			}

			if (!is_dir($base_path . '/uploads/telesales_documents/' . $telesales_id)) {
				mkdir($base_path . '/uploads/telesales_documents/' . $telesales_id);
			}

			$images = $this->upload_files($upload_path, 'doc', $telesales_documents);

			foreach ($images as $key => $value) {
				$params = array(
							'document_file_name' =>  $telesales_id . '/' . $value['orig_name'], 
							'title' =>  'Document' . ($key+1), 
							'file_size' => $value['file_size'], 
							'width' => $value['image_width'], 
							'height' => $value['image_height'], 
							'extension' => ltrim($value['file_ext'], '.'), 
							'telesales_id' => $telesales_id
				);

				$this->db->insert("telesales_documents", $params);
			}
		}
		/* end documents */

		/* recording */
		if(isset($telesales_call_recording) && count($telesales_call_recording)) {
			$upload_path = $base_path . '/uploads/telesales_call_recording/' . $telesales_id;

			if (!is_dir($base_path . '/uploads/telesales_call_recording')) {
				mkdir($base_path . '/uploads/telesales_call_recording');
			}

			if (!is_dir($base_path . '/uploads/telesales_call_recording/' . $telesales_id)) {
				mkdir($base_path . '/uploads/telesales_call_recording/' . $telesales_id);
			}

			// audio/mp3|audio/mpeg|audio/x-wav|audio/x-aiff|application/ogg
			$file = $this->upload_files($upload_path, 'rec', $telesales_call_recording, '*', 'telesales_call_recording');

			$update_data = array(
							'tsa_call_recording' =>  $telesales_id . '/' . $file['orig_name']
			);
			$this->db->where("id", $telesales_id);
			$this->db->update("telesales", $update_data);
		}
		/* end recording */

	}
	
	public function add_lead_submit_documents($data) {

		if ($this->session->userdata('user_id')) {
			$params = array();
			$params["dse_user_id"] = $data["source_dse"];
			$params["dse_tl_user_id"] = $data["source_tl_dse"];
			$params["atl_user_id"] = $data["source_atl"];
			$inserted = $this->db->insert("dse_documents_batch", $params);

			if ($inserted) {
				$batch_id = $this->db->insert_id();

				// $base_path = str_replace('/', '\\', FCPATH);
				$base_path = realpath(".");

        		$upload_path = $base_path . '/uploads/dse_documents/' . $batch_id;

        		if (!is_dir($base_path . '/uploads/dse_documents')) {
        			mkdir($base_path . '/uploads/dse_documents');
        		}

        		if (!is_dir($base_path . '/uploads/dse_documents/' . $batch_id)) {
        			mkdir($base_path . '/uploads/dse_documents/' . $batch_id);
        		}

				$images = $this->upload_files($upload_path, 'doc', $_FILES['images']);

				foreach ($images as $key => $value) {
					$params = array(
								'document_file_name' =>  $batch_id . '/' . $value['orig_name'], 
								'title' =>  $data['doc_title'][$key], 
								'file_size' => $value['file_size'], 
								'width' => $value['image_width'], 
								'height' => $value['image_height'], 
								'extension' => ltrim($value['file_ext'], '.'), 
								'dse_document_batch_id' => $batch_id
					);

					$this->db->insert("dse_documents", $params);
				}

				$this->session->set_flashdata('success_msg', 'Saved Successfully!');
			}
		}
	}

	private function upload_files($path, $title, $files, $allowed_types = 'jpg|gif|png|jpeg', $file_key = 'images[]') {
        $config = array(
            'upload_path'   => $path,
            'allowed_types' => $allowed_types
        );

        $this->load->library('upload', $config);

        $images = array();

        if (is_array($files['name'])) {
        	foreach ($files['name'] as $key => $image) {
	            $_FILES[$file_key]['name']= $files['name'][$key];
	            $_FILES[$file_key]['type']= $files['type'][$key];
	            $_FILES[$file_key]['tmp_name']= $files['tmp_name'][$key];
	            $_FILES[$file_key]['error']= $files['error'][$key];
	            $_FILES[$file_key]['size']= $files['size'][$key];

	            $fileName = $title .'_'. $image;
	            $config['file_name'] = $fileName;
	            $this->upload->initialize($config);

	            if ($this->upload->do_upload($file_key)) {
	               $images[] = $this->upload->data();
	            }
	        }
        } else {
        	$fileName = $title .'_'. $files['name'];
            $config['file_name'] = $fileName;
            $this->upload->initialize($config);

            if ($this->upload->do_upload($file_key)) {
               $images = $this->upload->data();
            }
        }
        return $images;
    }

	public function update_lead_generation($data, $id){
		$this->db->where("id", $id);
		$this->db->update("telesales", $data);

		$this->add_telesales_logs($id);
	}

	public function add_telesales_logs($id) {

		$log_added_by = $this->session->userdata('user_id');
		$query = $this->db->query("INSERT INTO telesales_logs
				(log_added_by, id, first_name, last_name, mobile_no, alternative_no, 
				email, city, address, extra_remarks, package_id, package_detail_id, 
				extra_remarks1, promo_device_id, handset_type_id, handset_model_id, 
				handset_color_id, contact_type, tsa_agent_status, visit_time, 
				tsa_call_recording, added_by, assigned_numbers_id, assigned_by, 
				assignee, plan_description, tsa, tl_agent, tl_csr, csr, bo, 
				is_tsa_read, is_teamlead_agent_read, is_teamlead_csr_read, is_csr_read, 
				csr_package_id, csr_package_detail_id, csr_plan_description, csr_remarks, 
				csr_status, is_dsr_created, special_discount)
				SELECT " .
				$log_added_by . ", id, first_name, last_name, mobile_no, alternative_no, 
				email, city, address, extra_remarks, package_id, package_detail_id, 
				extra_remarks1, promo_device_id, handset_type_id, handset_model_id, 
				handset_color_id, contact_type, tsa_agent_status, visit_time, 
				tsa_call_recording, added_by, assigned_numbers_id, assigned_by, 
				assignee, plan_description, tsa, tl_agent, tl_csr, csr, bo, 
				is_tsa_read, is_teamlead_agent_read, is_teamlead_csr_read, is_csr_read, 
				csr_package_id, csr_package_detail_id, csr_plan_description, csr_remarks, 
				csr_status, is_dsr_created, special_discount
				FROM telesales
				WHERE id = $id;");
	}
	
	public function get_bo_to_assign_lead(){
		$user_id = 4;
		$this->db->select("id")->from("telesales")->where("assignee", $user_id)->where("is_dsr_created", 0);
		$user_one_count = $this->db->count_all_results();
		
		if($user_one_count == 0){
			return $user_id;
		}
		$user_id = 24;
		$this->db->select("id")->from("telesales")->where("assignee", $user_id)->where("is_dsr_created", 0);
		$user_two_count = $this->db->count_all_results();
		
		if($user_two_count == 0){
			return $user_id;
		}
		
		else if($user_one_count >= $user_two_count){
			return 4;
		}
		
		else if($user_two_count >= $user_one_count){
			return 24;
		}
		
		
	}
	
	public function is_assiged_me_lead_generation($user_id, $id){
		//$this->db->select("assignee")->from("telesales")->where("id", $id)->where("assignee", $user_id);
		$this->db->select("assignee")->from("telesales")->where("id", $id);
		$this->db->where("(assignee = $user_id or tl_agent = $user_id or tl_csr = $user_id or csr = $user_id)", NULL, FALSE);
		if($this->db->count_all_results() > 0)
			return true;
		return false;
	}
	
	public function get_users_dropdowns($role_id) {
		
		$users = array();
		$this->db->select("users.first_name, users.last_name, users.id, call_centers.name as call_center_name")->from("users");
		$this->db->where("users_role.role_id", $role_id);
		$this->db->where("users.is_active", 1);
		$this->db->join("users_role", "users_role.user_id = users.id");
		$this->db->join("call_centers", "call_centers.id = users.call_center");
		$query = $this->db->get();

		if($query->num_rows() > 0){
			$users = $query->result_array();
		}

		return $users;
	}

	public function get_all_users($active = 1, $load_assoc = false) {
		$this->db->select("u.*")->from("users u");
		$this->db->where("u.is_active", $active);
		$this->db->join("users_role ur", "ur.user_id = u.id");
		$query = $this->db->get();
		
		if($query->num_rows() > 0) {
			$users = $query->result_array();

			if ($load_assoc) {
				$temp_users = array();
				foreach ($users as $key => $value) {
					$temp_users[$value['id']] = $value;
				}
				$users = $temp_users;
			}
		}

		return $users;
	}

	public function get_users_roles($user_id) {
		$this->db->select("ur.role_id")->from("users_role ur");
		$this->db->where("ur.user_id", $user_id);
		$query = $this->db->get();
		
		if($query->num_rows() > 0) {
			$records = $query->result_array();
			$temp_records = array();
			foreach ($records as $key => $value) {
				$temp_records[] = $value['role_id'];
			}
			$records = $temp_records;
		}

		return $records;
	}

	public function get_dropdowns_telesales() {
		$dropdowns = array();
		$dropdowns["csrs"] = array();
		$this->db->select("users.first_name, users.last_name, users.id, call_centers.name as call_center_name")->from("users");
		$this->db->where("users_role.role_id", 6);
		$this->db->where("users.is_active", 1);
		$this->db->join("users_role", "users_role.user_id = users.id");
		$this->db->join("call_centers", "call_centers.id = users.call_center");
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$dropdowns["csrs"] = $query->result_array();
		}
		
		$dropdowns["tl_csrs"] = array();
		$this->db->select("users.first_name, users.last_name, users.id, call_centers.name as call_center_name")->from("users");
		$this->db->where("users_role.role_id", 10);
		$this->db->where("users.is_active", 1);
		$this->db->join("users_role", "users_role.user_id = users.id");
		$this->db->join("call_centers", "call_centers.id = users.call_center");
		$query = $this->db->get();
		//echo $this->db->last_query()."<br>";
		if($query->num_rows() > 0){
			$dropdowns["tl_csrs"] = $query->result_array();
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
		
		$dropdowns["csr_status"] = array();
		$this->db->select("*")->from("csr_status");
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$dropdowns["csr_status"] = $query->result_array();
		}
		
		$dropdowns["telesales_status"] = $this->get_telesales_status(0, 1);

		return $dropdowns;
	}

	public function get_tl_telesales() {
		$data = array();
		$this->db->select("users.first_name, users.last_name, users.id, call_centers.name as call_center_name")->from("users");
		$this->db->where("users_role.role_id", 4);
		$this->db->where("users.is_active", 1);
		$this->db->join("users_role", "users_role.user_id = users.id");
		$this->db->join("call_centers", "call_centers.id = users.call_center");
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			$data = $query->result_array();
		}

		return $data;
	}
	
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
	
	public function get_all_tsa_status(){
		$status = array();
		$this->db->select("*")->from("tsa_status");
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$status = $query->result_array();
		}
		return $status;
	}

	public function get_telesales_status($id = 0, $is_active = '') {
		$status = array();
		$this->db->select("*")->from("telesales_status");

		if ($id > 0) {
			$this->db->where("id", $id);
		}
		if (!empty($is_active)) {
			$this->db->where("is_active", $is_active);
		}

		$query = $this->db->get();
		if($query->num_rows() > 0){
			$status = $query->result_array();
		}
		return $status;
	}

	public function add_telesales_status($data) {
		$this->db->insert("telesales_status", $data);
	}
	
	public function edit_telesales_status($data, $id) {
		$this->db->where("id", $id);
		$this->db->update("telesales_status", $data);
	}

	public function get_tsa_status($id){
		$status = array();
		$this->db->select("*")->from("tsa_status");
		$this->db->where("id", $id);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$status = $query->row_array();
			//echo "<pre>"; print_r($status); echo "</pre>";
		}
		return $status;
	}
	
	public function add_tsa_status($data){
		$this->db->set("date_added", date("Y-m-d"));
		$this->db->insert("tsa_status", $data);
	}
	
	public function edit_tsa_status($data, $id){
		$this->db->where("id", $id);
		$this->db->update("tsa_status", $data);
	}

	public function get_telesales_discount($id = 0) {
		$discounts = array();
		$this->db->select("*")->from("telesales_discounts");
		if ($id > 0) {
			$this->db->where("id", $id);
		}
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$discounts = $query->result_array();
		}
		return $discounts;
	}

	public function add_telesales_discount($data){
		$this->db->insert("telesales_discounts", $data);
	}
	
	public function edit_telesales_discount($data, $id){
		$this->db->where("id", $id);
		$this->db->update("telesales_discounts", $data);
	}

	public function get_package_classifications($id = 0) {
		$discounts = array();
		$this->db->select("*")->from("package_classifications");
		if ($id > 0) {
			$this->db->where("id", $id);
		}
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$discounts = $query->result_array();
		}
		return $discounts;
	}

	public function add_package_classifications($data){
		$this->db->insert("package_classifications", $data);
	}
	
	public function edit_package_classifications($data, $id){
		$this->db->where("id", $id);
		$this->db->update("package_classifications", $data);
	}
	
	public function get_all_csr_status(){
		$status = array();
		$this->db->select("*")->from("csr_status");
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$status = $query->result_array();
		}
		return $status;
	}
	
	public function get_csr_status($id){
		$status = array();
		$this->db->select("*")->from("csr_status");
		$this->db->where("id", $id);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$status = $query->row_array();
			//echo "<pre>"; print_r($status); echo "</pre>";
		}
		return $status;
	}
	
	public function add_csr_status($data){
		$this->db->set("date_added", date("Y-m-d"));
		$this->db->insert("csr_status", $data);
	}
	
	public function edit_csr_status($data, $id){
		$this->db->where("id", $id);
		$this->db->update("csr_status", $data);
	}
	
	//----------------handset type---------------------
	public function get_all_handset_types(){
		$status = array();
		$this->db->select("*")->from("handset_types");
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$status = $query->result_array();
		}
		return $status;
	}
	
	public function get_handset_type($id){
		$status = array();
		$this->db->select("*")->from("handset_types");
		$this->db->where("id", $id);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$status = $query->row_array();
			//echo "<pre>"; print_r($status); echo "</pre>";
		}
		return $status;
	}
	
	public function add_handset_type($data){
		$this->db->set("date_added", date("Y-m-d"));
		$this->db->insert("handset_types", $data);
	}
	
	public function edit_handset_type($data, $id){
		$this->db->where("id", $id);
		$this->db->update("handset_types", $data);
	}
	
	//----------------handset type---------------------
	public function get_all_handset_models(){
		$status = array();
		$this->db->select("*")->from("handset_models");
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$status = $query->result_array();
		}
		return $status;
	}
	
	public function get_handset_model($id){
		$status = array();
		$this->db->select("*")->from("handset_models");
		$this->db->where("id", $id);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$status = $query->row_array();
			//echo "<pre>"; print_r($status); echo "</pre>";
		}
		return $status;
	}
	
	public function add_handset_model($data){
		$this->db->set("date_added", date("Y-m-d"));
		$this->db->insert("handset_models", $data);
	}
	
	public function edit_handset_model($data, $id){
		$this->db->where("id", $id);
		$this->db->update("handset_models", $data);
	}
	
	//----------------handset color---------------------
	public function get_all_handset_colors(){
		$status = array();
		$this->db->select("*")->from("handset_colors");
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$status = $query->result_array();
		}
		return $status;
	}
	
	public function get_handset_color($id){
		$status = array();
		$this->db->select("*")->from("handset_colors");
		$this->db->where("id", $id);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$status = $query->row_array();
			//echo "<pre>"; print_r($status); echo "</pre>";
		}
		return $status;
	}
	
	public function add_handset_color($data){
		$this->db->set("date_added", date("Y-m-d"));
		$this->db->insert("handset_colors", $data);
	}
	
	public function edit_handset_color($data, $id){
		$this->db->where("id", $id);
		$this->db->update("handset_colors", $data);
	}
	
	//----------------Promo Device---------------------
	public function get_all_promo_devices(){
		$status = array();
		$this->db->select("*")->from("promo_devices");
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$status = $query->result_array();
		}
		return $status;
	}
	
	public function get_promo_device($id){
		$status = array();
		$this->db->select("*")->from("promo_devices");
		$this->db->where("id", $id);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$status = $query->row_array();
			//echo "<pre>"; print_r($status); echo "</pre>";
		}
		return $status;
	}
	
	public function add_promo_device($data){
		$this->db->set("date_added", date("Y-m-d"));
		$this->db->insert("promo_devices", $data);
	}
	
	public function edit_promo_device($data, $id){
		$this->db->where("id", $id);
		$this->db->update("promo_devices", $data);
	}
	
	//----------------Lead Classifications---------------------
	public function get_all_lead_classifications(){
		$status = array();
		$this->db->select("*")->from("lead_classifications");
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$status = $query->result_array();
		}
		return $status;
	}
	
	public function get_lead_classification($id){
		$status = array();
		$this->db->select("*")->from("lead_classifications");
		$this->db->where("id", $id);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$status = $query->row_array();
			//echo "<pre>"; print_r($status); echo "</pre>";
		}
		return $status;
	}
	
	public function add_lead_classification($data){
		$this->db->set("date_added", date("Y-m-d"));
		$this->db->insert("lead_classifications", $data);
	}
	
	public function edit_lead_classification($data, $id){
		$this->db->where("id", $id);
		$this->db->update("lead_classifications", $data);
	}
	
	//----------------Documents---------------------
	public function get_all_documents(){
		$status = array();
		$this->db->select("*")->from("documents");
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$status = $query->result_array();
		}
		return $status;
	}
	
	public function get_document($id){
		$status = array();
		$this->db->select("*")->from("documents");
		$this->db->where("id", $id);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$status = $query->row_array();
			//echo "<pre>"; print_r($status); echo "</pre>";
		}
		return $status;
	}
	
	public function add_document($data){
		$this->db->set("date_added", date("Y-m-d"));
		$this->db->insert("documents", $data);
	}
	
	public function edit_document($data, $id){
		$this->db->where("id", $id);
		$this->db->update("documents", $data);
	}
	
	//----------------Call centers---------------------
	public function get_all_call_centers(){
		$status = array();
		$this->db->select("*")->from("call_centers");
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$status = $query->result_array();
		}
		return $status;
	}
	
	public function get_call_center($id){
		$status = array();
		$this->db->select("*")->from("call_centers");
		$this->db->where("id", $id);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$status = $query->row_array();
			//echo "<pre>"; print_r($status); echo "</pre>";
		}
		return $status;
	}
	
	public function add_call_center($data){
		$this->db->set("date_added", date("Y-m-d"));
		$this->db->insert("call_centers", $data);
	}
	
	public function edit_call_center($data, $id){
		$this->db->where("id", $id);
		$this->db->update("call_centers", $data);
	}
	
	//----------------Languages---------------------
	public function get_all_languages(){
		$status = array();
		$this->db->select("*")->from("languages");
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$status = $query->result_array();
		}
		return $status;
	}
	
	public function get_language($id){
		$status = array();
		$this->db->select("*")->from("languages");
		$this->db->where("id", $id);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$status = $query->row_array();
			//echo "<pre>"; print_r($status); echo "</pre>";
		}
		return $status;
	}
	
	public function add_language($data){
		$this->db->set("date_added", date("Y-m-d"));
		$this->db->insert("languages", $data);
	}
	
	public function edit_language($data, $id){
		$this->db->where("id", $id);
		$this->db->update("languages", $data);
	}
	
	//----------------Kiosk---------------------
	public function get_all_kiosks(){
		$status = array();
		$this->db->select("*")->from("kiosks");
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$status = $query->result_array();
		}
		return $status;
	}
	
	public function get_kiosk($id){
		$status = array();
		$this->db->select("*")->from("kiosks");
		$this->db->where("id", $id);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$status = $query->row_array();
			//echo "<pre>"; print_r($status); echo "</pre>";
		}
		return $status;
	}
	
	public function add_kiosk($data){
		$this->db->set("date_added", date("Y-m-d"));
		$this->db->insert("kiosks", $data);
	}
	
	public function edit_kiosk($data, $id){
		$this->db->where("id", $id);
		$this->db->update("kiosks", $data);
	}
	
	//----------------Data Source---------------------
	public function get_all_data_sources(){
		$status = array();
		$this->db->select("*")->from("data_sources");
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$status = $query->result_array();
		}
		return $status;
	}
	
	public function get_data_source($id){
		$status = array();
		$this->db->select("*")->from("data_sources");
		$this->db->where("id", $id);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$status = $query->row_array();
			//echo "<pre>"; print_r($status); echo "</pre>";
		}
		return $status;
	}
	
	public function add_data_source($data){
		$this->db->set("date_added", date("Y-m-d"));
		$this->db->insert("data_sources", $data);
	}
	
	public function edit_data_source($data, $id){
		$this->db->where("id", $id);
		$this->db->update("data_sources", $data);
	}
	
	
	
	
	
	/*public function add($data){
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
	}*/
}
