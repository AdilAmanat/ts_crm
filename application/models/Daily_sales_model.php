<?php

class Daily_sales_model extends CRM_Model {

    public function __construct() {
        parent::__construct();
    }
	
	public function get_sale($id){
		$sale = array();
		$this->db->select("*")->from("daily_sales")->where("id", $id);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$sale = $query->row_array();
			$sale["attachments"] = array();
			$this->db->select("*")->from("daily_sales_files")->where("daily_sales_id", $id);
			$query = $this->db->get();
			if($query->num_rows() > 0){
				$attachments = $query->result_array();
				foreach($attachments as $attachment)
					$sale["attachments"][] = $attachment["file_name"];
				
				if($sale["package_id"] != "" && $sale["package_id"] != 0){
					$this->db->select("*")->from("packages_detail")->where("package_id", $sale["package_id"]);
					$query = $this->db->get();
					if($query->num_rows() > 0){
						$sale["package_selected_detail"] = $query->result_array();
						
					}
				}
			}
		}
		//echo "<pre>"; print_r($sale); echo "</pre>";
		return $sale;
	}
	
	public function search_daily_sales($filters = false, $sale_id = false){
		//echo "<pre>"; print_r($data); echo "</pre>";exit;
		$daily_sales = array();
		$this->db->select("daily_sales.*")->from("daily_sales");/*, users.first_name as acquistion_agent_first_name, users.last_name as acquistion_agent_last_name*/
		
		if(!$sale_id){
			foreach($filters as $key => $filter){
				if($key == "date_start" || $key == "date_end") continue;
				if($filter != "")
				$this->db->where($key, $filter);
			}
		}
		else{
			$this->db->where("daily_sales.id", $sale_id);
		}
		
		if($filters["date_start"] != "" || $filters["date_end"] != ""){
			if($filters["date_start"] != "" && $filters["date_end"] != ""){
				$this->db->where('(daily_sales.month BETWEEN "' . date('Y-m-d', strtotime($filters["date_start"])) . '" and "' . date('Y-m-d', strtotime($filters["date_end"])) . '")', null, false);						
			}
			else if($filters["date_start"] != "" && $filters["date_end"] == ""){
				$this->db->where('(daily_sales.month >= "' . date('Y-m-d', strtotime($filters["date_start"])) . '")', null, false);					
			}
			else if($filters["date_start"] == "" && $filters["date_end"] != ""){
				$this->db->where('(daily_sales.month <= "' . date('Y-m-d', strtotime($filters["date_end"])) . '")', null, false);					
			}
		}
		
		$query = $this->db->get();
		//echo $this->db->last_query()."<br><br><br>";
		if($query->num_rows() > 0){
			$daily_sales = $query->result_array();
			foreach($daily_sales as $key => $sale){
				$daily_sales[$key]["attachments"] = array();
				$this->db->select("file_name")->from("daily_sales_files")->where("daily_sales_id", $sale["id"]);
				$query = $this->db->get();
				if($query->num_rows() > 0){
					$attachments = $query->result_array();
					foreach($attachments as $attachment)
						$daily_sales[$key]["attachments"][] = $attachment["file_name"];
				}
				
				if($sale["location_id"] != "" || $sale["location_id"] != 0){
					$this->db->select("name")->from("call_centers")->where("id", $sale["location_id"]);
					$query = $this->db->get();
					if($query->num_rows() > 0){
						$daily_sales[$key]["locaiton_name"] = $query->row()->name;
					}
				}
				
				if($sale["city_id"] != "" || $sale["city_id"] != 0){
					$this->db->select("city_name")->from("cities")->where("id", $sale["city_id"]);
					$query = $this->db->get();
					if($query->num_rows() > 0){
						$daily_sales[$key]["city_name"] = $query->row()->city_name;
					}
				}
				
				if($sale["promo_device_id"] != "" || $sale["promo_device_id"] != 0){
					$this->db->select("name")->from("promo_devices")->where("id", $sale["promo_device_id"]);
					$query = $this->db->get();
					if($query->num_rows() > 0){
						$daily_sales[$key]["promo_device_name"] = $query->row()->name;
					}
				}
				
				if($sale["package_classification_id"] != "" || $sale["package_classification_id"] != 0){
					$this->db->select("classifications_name")->from("package_classifications")->where("id", $sale["package_classification_id"]);
					$query = $this->db->get();
					if($query->num_rows() > 0){
						$daily_sales[$key]["classifications_name"] = $query->row()->classifications_name;
					}
				}
				
				if($sale["package_id"] != "" || $sale["package_id"] != 0){
					$this->db->select("package_name")->from("packages")->where("id", $sale["package_id"]);
					$query = $this->db->get();
					if($query->num_rows() > 0){
						$daily_sales[$key]["package_name"] = $query->row()->package_name;
					}
				}
				
				if($sale["package_detail_id"] != "" || $sale["package_detail_id"] != 0){
					$this->db->select("package_duration, package_description")->from("packages_detail")->where("id", $sale["package_detail_id"]);
					$query = $this->db->get();
					if($query->num_rows() > 0){
						$daily_sales[$key]["package_duration"] = $query->row()->package_duration;
						$daily_sales[$key]["package_description"] = $query->row()->package_description;
					}
				}
				
				if($sale["sales_manager_id"] != "" || $sale["sales_manager_id"] != 0){
					$this->db->select("users.first_name as sales_manager_first_name, users.last_name as sales_manager_last_name")->from("users")->where("id", $sale["sales_manager_id"]);
					$query = $this->db->get();
					if($query->num_rows() > 0){
						$daily_sales[$key]["sales_manager_first_name"] = $query->row()->sales_manager_first_name;
						$daily_sales[$key]["sales_manager_last_name"] = $query->row()->sales_manager_last_name;
					}
				}
				
				if($sale["teamlead_id"] != "" || $sale["teamlead_id"] != 0){
					$this->db->select("users.first_name as teamlead_first_name, users.last_name as teamlead_last_name")->from("users")->where("id", $sale["teamlead_id"]);
					$query = $this->db->get();
					if($query->num_rows() > 0){
						$daily_sales[$key]["teamlead_first_name"] = $query->row()->teamlead_first_name;
						$daily_sales[$key]["teamlead_last_name"] = $query->row()->teamlead_last_name;
					}
				}
				
				if($sale["activation_agent_id"] != "" || $sale["activation_agent_id"] != 0){
					$this->db->select("users.first_name as activation_agent_first_name, users.last_name as activation_agent_last_name")->from("users")->where("id", $sale["activation_agent_id"]);
					$query = $this->db->get();
					if($query->num_rows() > 0){
						$daily_sales[$key]["activation_agent_first_name"] = $query->row()->activation_agent_first_name;
						$daily_sales[$key]["activation_agent_last_name"] = $query->row()->activation_agent_last_name;
					}
				}
				
				if($sale["acquistion_agent_id"] != "" || $sale["acquistion_agent_id"] != 0){
					$this->db->select("users.first_name as acquistion_agent_first_name, users.last_name as acquistion_agent_last_name")->from("users")->where("id", $sale["acquistion_agent_id"]);
					$query = $this->db->get();
					if($query->num_rows() > 0){
						$daily_sales[$key]["acquistion_agent_first_name"] = $query->row()->acquistion_agent_first_name;
						$daily_sales[$key]["acquistion_agent_last_name"] = $query->row()->acquistion_agent_last_name;
					}
				}
				
				if($sale["kiosk_id"] != "" || $sale["kiosk_id"] != 0){
					$this->db->select("kiosks.name as kiosk_name")->from("kiosks")->where("id", $sale["kiosk_id"]);
					$query = $this->db->get();
					if($query->num_rows() > 0){
						$daily_sales[$key]["kiosk_name"] = $query->row()->kiosk_name;
					}
				}
				
				if($sale["handset_type_id"] != "" || $sale["handset_type_id"] != 0){
					$this->db->select("handset_types.name as handset_type_name")->from("handset_types")->where("id", $sale["handset_type_id"]);
					$query = $this->db->get();
					if($query->num_rows() > 0){
						$daily_sales[$key]["handset_type_name"] = $query->row()->handset_type_name;
					}
				}
				
				if($sale["handset_model_id"] != "" || $sale["handset_model_id"] != 0){
					$this->db->select("handset_models.name as handset_model_name")->from("handset_models")->where("id", $sale["handset_model_id"]);
					$query = $this->db->get();
					if($query->num_rows() > 0){
						$daily_sales[$key]["handset_model_name"] = $query->row()->handset_model_name;
					}
				}
				
				if($sale["handset_color_id"] != "" || $sale["handset_color_id"] != 0){
					$this->db->select("handset_colors.color as handset_color_name")->from("handset_colors")->where("id", $sale["handset_color_id"]);
					$query = $this->db->get();
					if($query->num_rows() > 0){
						$daily_sales[$key]["handset_color_name"] = $query->row()->handset_color_name;
					}
				}
				
				if($sale["handset_color_id"] != "" || $sale["handset_color_id"] != 0){
					$this->db->select("lead_classifications.classification as lead_classification_type")->from("lead_classifications")->where("id", $sale["lead_classification_id"]);
					$query = $this->db->get();
					if($query->num_rows() > 0){
						$daily_sales[$key]["lead_classification_type"] = $query->row()->lead_classification_type;
					}
				}
				
				
				
				if($sale["document_id"] != "" || $sale["document_id"] != 0){
					$this->db->select("documents.name as document_name")->from("documents")->where("id", $sale["document_id"]);
					$query = $this->db->get();
					if($query->num_rows() > 0){
						$daily_sales[$key]["document_name"] = $query->row()->document_name;
					}
				}
			}
		}
		//echo $this->db->last_query();
		//echo "<br><br><pre>"; print_r($daily_sales); echo "</pre>";
		//exit;
		return $daily_sales;
	}
	
	public function get_package_detail($package_id){
		$package_detail = array();
		$this->db->select("*")->from("packages_detail")->where("package_id", $package_id);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			$package_detail = $query->result_array();
		}
		
		return $package_detail;
	}
	public function get_all_sales(){
		//exit;
	}
	
	public function get_dropdowns(){
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
		$this->db->or_where("users_role.role_id", 11);
		$this->db->join("users_role", "users_role.user_id = users.id");
		$this->db->group_by("users.id");
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
		//echo date("Y-m-d", strtotime($data["month"]));
		//echo "<br><pre>"; print_r($_FILES['attachments']);print_r($data); echo "</pre>";//exit;
		$data["month"] = date("Y-m-d", strtotime($data["month"]));
		$data["submission_date"] = date("Y-m-d", strtotime($data["submission_date"]));
		$data["alternative_bo_date"] = date("Y-m-d", strtotime($data["alternative_bo_date"]));
		
		$this->db->set("added_by", $this->session->userdata('user_id'));
		$this->db->set("date_added", date("Y-m-d"));
		$this->db->insert("daily_sales", $data);
		$sale_id = $this->db->insert_id();
		if(isset($_FILES['attachments'])){
			$attachments = $this->upload_attached_documents();
			//echo "<pre>"; print_r($attachments); echo "</pre>";
			foreach($attachments as $attachement){
				$document_data = array(
					"file_name" => $attachement,
					"daily_sales_id" => $sale_id
				);
				$this->db->insert("daily_sales_files", $document_data);
			}
		}
		//exit;	
	}
	
	public function edit($data, $sale_id){
		//echo date("Y-m-d", strtotime($data["month"]));
		//echo "<br><pre>"; print_r($_FILES['attachments']);print_r($data); echo "</pre>";//exit;
		$data["month"] = date("Y-m-d", strtotime($data["month"]));
		$data["submission_date"] = date("Y-m-d", strtotime($data["submission_date"]));
		$data["alternative_bo_date"] = date("Y-m-d", strtotime($data["alternative_bo_date"]));
		
		//$this->db->set("added_by", $this->session->userdata('user_id'));
		//$this->db->set("date_added", date("Y-m-d"));
		$this->db->where("id", $sale_id);
		$this->db->update("daily_sales", $data);
		//$sale_id = $this->db->insert_id();
		if(isset($_FILES['attachments'])){
			$attachments = $this->upload_attached_documents();
			//echo "<pre>"; print_r($attachments); echo "</pre>";
			foreach($attachments as $attachement){
				$document_data = array(
					"file_name" => $attachement,
					"daily_sales_id" => $sale_id
				);
				$this->db->insert("daily_sales_files", $document_data);
			}
		}
		//exit;	
	}
	
	public function upload_attached_documents(){
		$this->load->helper('string');
		$documents = array();
		$targetFolder = '/uploads/daily_sales'; // Relative to the root
		if(isset($_FILES)){
			foreach($_FILES['attachments']["name"] as $key => $document){
				$tempFile = $_FILES['attachments']['tmp_name'][$key];
				$targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
				// Validate the file type
				//$fileTypes = array('jpg','jpeg','gif','png','JPG','JPEG','GIF','PNG'); // File extensions
				$fileParts = pathinfo($_FILES['attachments']['name'][$key]);
				$filename = random_string('alnum', 16) . '-daily-sale.' . $fileParts['extension'];
				$documents[] = $filename;
				$targetFile = rtrim($targetPath,'/') . '/' . $filename;
				//if (in_array($fileParts['extension'],$fileTypes)) {
					move_uploaded_file($tempFile,$targetFile);
					//echo $filename;
				//}
			}
			
			return $documents;
		}
	}
}
