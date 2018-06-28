<?php

class Tsa extends CI_Controller {

    function __construct() {
        parent::__construct();
    }
	
	public function index(){		
		$data = array();
		//$data['js_includes'][] = '/assets/js/data_create.js';

		$this->load->view("back_office/index", $data);
	}
	
	function upload_data(){
		set_time_limit(0);
		//echo "File in controller:<pre>"; print_r($_FILES); echo "<pre>";
		$this->load->helper('string');
		$token = random_string('alnum', 16);
		
		$this->load->model("numbers_model");
        $this->numbers_model->import_csv($token);
		//echo "Done";
		//exit;
        redirect("/back_office/validate/?token=$token");
    }
	
	function validate(){
		$token = $this->input->get("token");
		$this->load->model("numbers_model");
		$data["numbers"] = $this->numbers_model->get_temp_export($token);
		$this->load->view("back_office/index", $data);	
	}
	
}
