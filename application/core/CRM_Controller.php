<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class CRM_Controller extends CI_Controller {

    protected $header_data;
    protected $footer_data;
    protected $header_view;
    protected $footer_view;

    public function __construct() {
        parent::__construct();
		
        $this->header_data = array();
        $this->footer_data = array();

        $this->header_view = 'templates/header';
        $this->footer_view = 'templates/footer';
		
    }

    public function _output($output) {
		//echo "<pre>"; print_r($route); echo "</pre>";
       // $current_url = current_url();
		//echo $current_url;exit;
        //$url = substr($current_url, 1);
		/*$url = $this->uri->segment(1);
		$this->load->model("content_model");
		$this->load->model("site_content_model");
		$categories = $this->content_model->get_all_categories();
		$footer_contact = $this->site_content_model->get_content_by_type("footer_address");
		$seo_data = $this->content_model->get_seo_content($url, $id = false);
		
		$this->load->model("banners_model");
		$banner = $this->banners_model->get_subpage_banners_header($is_active = 1, $page = $this->uri->segment(1));
		//echo "banners:<pre>"; print_r($banners); echo "</pre>";
		
		//echo $this->uri->segment(1);
		$language = $this->session->userdata('language');
		if($language == false){
			$set_language = array(
				"language" => "english"
			);
			$this->session->set_userdata($set_language);
		}
		$this->header_data['seo_data'] = $seo_data;
		$this->header_data['header_banner'] = $banner;
		$this->header_data['header_categories'] = $categories;
		$this->footer_data['footer_categories'] = $categories;
		$this->footer_data['footer_contact'] = $footer_contact;*/
		
        if ($this->input->is_ajax_request()) {
            echo ($output);
        } else {
            echo $this->load->view($this->header_view, $this->header_data, true);
            echo ($output);
            echo $this->load->view($this->footer_view, $this->footer_data, true);
        }

        $this->db->close();
    }

}

class Login_Controller extends CI_Controller {

	protected $header_data;
	protected $footer_data;

	public function __construct() {
		parent::__construct();
		$this->load->model('users_model');
		//echo "Admin Controller<br>";exit;

		if ($this->users_model->is_admin() !== true) {
			redirect('/');
		}

		$this->header_view = 'templates/login_header';
		$this->footer_view = 'templates/login_footer';
	}

}

class Auth_Controller extends CRM_Controller {

    protected $header_data;
    protected $footer_data;

    public function __construct() {
        parent::__construct();
		//return;

        $this->load->helper('form');
        $this->load->model('content_model');
		$this->load->model('users_model');
		//echo "PArent constructor<br>";
		//echo "Admin Controller<br>";exit;
		//echo "Get Notification<br>";
		$this->header_data['header_notifications'] = $this->content_model->get_notifications();
        //session_start();
		//echo "user_id:".$this->session->userdata('user_id')."<br>";
		$user_data = $this->session->userdata('user_data');
		//echo "<pre>"; print_r($user_data); echo "</pre>";exit;
		if(!$this->session->userdata('user_data')){
			redirect('/');
		}
		if (is_numeric($user_data['id'])) {
			$this->session->set_userdata('user_id', $user_data['id']);
		}

		if ($this->users_model->is_user_active() !== true) {
			//$this->session->set_userdata('post_login_redirect_url', current_url());

			$this->session->unset_userdata('user_data');
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('user_name');
			if (session_id() != '')
				session_destroy();

			redirect('/');
		}
		if (!$this->session->userdata('user_id')) {
			redirect('/');
		}
    }

}
class Admin_Controller extends Auth_Controller {

	protected $header_data;
	protected $footer_data;

	public function __construct() {
		parent::__construct();
		$this->load->model('users_model');
		//echo "PArent constructor<br>";
		//echo "Admin Controller<br>";exit;

		if ($this->users_model->is_admin() !== true) {
			redirect('/');
		}

		$this->header_view = 'templates/header';
		$this->footer_view = 'templates/footer';
	}

}


class Generator_Controller extends Auth_Controller {

	protected $header_data;
	protected $footer_data;

	public function __construct() {
		parent::__construct();
		$this->load->model('users_model');
		

		if ($this->users_model->is_generator() !== true) {
			$user_data = $this->session->userdata('user_data');
			//echo "<pre>"; print_r($user_data); echo "</pre>";exit;
			if(in_array(1, $user_data['user_type'])){
				redirect('admin/');
			}
			if(in_array(2, $user_data['user_type'])){
				redirect('generate/');
			}
			if(in_array(3, $user_data['user_type'])){
				redirect('back-office/');
			}
			if(in_array(4, $user_data['user_type'])){
				redirect('teamlead-agent/');
			}
			if(in_array(10, $user_data['user_type'])){
				redirect('teamlead-csr/');
			}
			if(in_array(5, $user_data['user_type'])){
				redirect('telesale/');
			}
			if(in_array(6, $user_data['user_type'])){
				redirect('csr/');
			}
			if(in_array(7, $user_data['user_type'])){
				redirect('dse/');
			}
			//redirect('/');
		}

		//$this->header_view = 'generator/templates/header';
		$this->header_view = 'templates/header';
		$this->footer_view = 'templates/footer';
	}

}

class TSA_Controller extends Auth_Controller {

	protected $header_data;
	protected $footer_data;

	public function __construct() {
		parent::__construct();
		$this->load->model('users_model');
		//echo "PArent constructor<br>";
		//echo "Admin Controller<br>";exit;
		
		if ($this->users_model->is_tsa() !== true) {
			$user_data = $this->session->userdata('user_data');
			//echo "<pre>"; print_r($user_data); echo "</pre>";exit;
			if(in_array(1, $user_data['user_type'])){
				redirect('admin/');
			}
			if(in_array(2, $user_data['user_type'])){
				redirect('generate/');
			}
			if(in_array(3, $user_data['user_type'])){
				redirect('back-office/');
			}
			if(in_array(4, $user_data['user_type'])){
				redirect('teamlead-agent/');
			}
			if(in_array(10, $user_data['user_type'])){
				redirect('teamlead-csr/');
			}
			if(in_array(5, $user_data['user_type'])){
				redirect('telesale/');
			}
			if(in_array(6, $user_data['user_type'])){
				redirect('csr/');
			}
			if(in_array(7, $user_data['user_type'])){
				redirect('dse/');
			}
			//redirect('/');
		}

		//$this->header_view = 'telesale/templates/header';
		$this->header_view = 'templates/header';
		$this->footer_view = 'templates/footer';
	}

}

class TL_Controller extends Auth_Controller {

	protected $header_data;
	protected $footer_data;

	public function __construct() {
		parent::__construct();
		$this->load->model('users_model');
		//echo "PArent constructor<br>";
		//echo "Admin Controller<br>";exit;
		if ($this->users_model->is_tl() !== true) {
			$user_data = $this->session->userdata('user_data');
			//echo "<pre>"; print_r($user_data); echo "</pre>";//exit;
			
			
			if(in_array(1, $user_data['user_type'])){
				redirect('admin/');
			}
			if(in_array(2, $user_data['user_type'])){
				redirect('generate/');
			}
			if(in_array(3, $user_data['user_type'])){
				redirect('back-office/');
			}
			if(in_array(4, $user_data['user_type'])){
				redirect('teamlead-agent/');
			}
			if(in_array(10, $user_data['user_type'])){
				redirect('teamlead-csr/');
			}
			if(in_array(5, $user_data['user_type'])){
				redirect('telesale/');
			}
			if(in_array(6, $user_data['user_type'])){
				redirect('csr/');
			}
			if(in_array(7, $user_data['user_type'])){
				redirect('dse/');
			}
			//redirect('/');
		}

		//$this->header_view = 'teamlead/templates/header';
		$this->header_view = 'templates/header';
		$this->footer_view = 'templates/footer';
	}

}


class TL_CSR_Controller extends Auth_Controller {

	protected $header_data;
	protected $footer_data;

	public function __construct() {
		parent::__construct();
		$this->load->model('users_model');
		//echo "PArent constructor<br>";
		//echo "Admin Controller<br>";exit;
		if ($this->users_model->is_tl_csr() !== true) {
			$user_data = $this->session->userdata('user_data');
			//echo "<pre>"; print_r($user_data); echo "</pre>";//exit;
			
			
			if(in_array(1, $user_data['user_type'])){
				redirect('admin/');
			}
			if(in_array(2, $user_data['user_type'])){
				redirect('generate/');
			}
			if(in_array(3, $user_data['user_type'])){
				redirect('back-office/');
			}
			if(in_array(4, $user_data['user_type'])){
				redirect('teamlead-agent/');
			}
			if(in_array(10, $user_data['user_type'])){
				redirect('teamlead-csr/');
			}
			if(in_array(5, $user_data['user_type'])){
				redirect('telesale/');
			}
			if(in_array(6, $user_data['user_type'])){
				redirect('csr/');
			}
			if(in_array(7, $user_data['user_type'])){
				redirect('dse/');
			}
			//redirect('/');
		}

		//$this->header_view = 'teamlead/templates/header';
		$this->header_view = 'templates/header';
		$this->footer_view = 'templates/footer';
	}

}

class TL_DSE_Controller extends Auth_Controller {

	protected $header_data;
	protected $footer_data;

	public function __construct() {
		parent::__construct();
		$this->load->model('users_model');
		//echo "PArent constructor<br>";
		//echo "Admin Controller<br>";exit;
		if ($this->users_model->is_tl_dse() !== true) {
			$user_data = $this->session->userdata('user_data');
			//echo "<pre>"; print_r($user_data); echo "</pre>";//exit;
			
			
			if(in_array(1, $user_data['user_type'])){
				redirect('admin/');
			}
			if(in_array(2, $user_data['user_type'])){
				redirect('generate/');
			}
			if(in_array(3, $user_data['user_type'])){
				redirect('back-office/');
			}
			if(in_array(4, $user_data['user_type'])){
				redirect('teamlead-agent/');
			}
			if(in_array(10, $user_data['user_type'])){
				redirect('teamlead-csr/');
			}
			if(in_array(5, $user_data['user_type'])){
				redirect('telesale/');
			}
			if(in_array(6, $user_data['user_type'])){
				redirect('csr/');
			}
			if(in_array(7, $user_data['user_type'])){
				redirect('dse/');
			}
			//redirect('/');
		}

		//$this->header_view = 'teamlead/templates/header';
		$this->header_view = 'templates/header';
		$this->footer_view = 'templates/footer';
	}

}

class BL_Controller extends Auth_Controller {

	protected $header_data;
	protected $footer_data;

	public function __construct() {
		parent::__construct();
		$this->load->model('users_model');
		//echo "PArent constructor<br>";
		//echo "Admin Controller<br>";exit;

		if ($this->users_model->is_bl() !== true) {
			$user_data = $this->session->userdata('user_data');
			//echo "<pre>"; print_r($user_data); echo "</pre>";exit;
			if(in_array(1, $user_data['user_type'])){
				redirect('admin/');
			}
			if(in_array(2, $user_data['user_type'])){
				redirect('generate/');
			}
			if(in_array(3, $user_data['user_type'])){
				redirect('back-office/');
			}
			if(in_array(4, $user_data['user_type'])){
				redirect('teamlead-agent/');
			}
			if(in_array(10, $user_data['user_type'])){
				redirect('teamlead-csr/');
			}
			if(in_array(5, $user_data['user_type'])){
				redirect('telesale/');
			}
			if(in_array(6, $user_data['user_type'])){
				redirect('csr/');
			}
			if(in_array(7, $user_data['user_type'])){
				redirect('dse/');
			}
			//redirect('/');
		}

		//$this->header_view = 'back_office/templates/header';
		$this->header_view = 'templates/header';
		$this->footer_view = 'templates/footer';
	}

}

class CSR_Controller extends Auth_Controller {

	protected $header_data;
	protected $footer_data;

	public function __construct() {
		parent::__construct();
		$this->load->model('users_model');
		//echo "PArent constructor<br>";
		//echo "Admin Controller<br>";exit;

		if ($this->users_model->is_csr() !== true) {
			$user_data = $this->session->userdata('user_data');
			//echo "<pre>"; print_r($user_data); echo "</pre>";exit;
			if(in_array(1, $user_data['user_type'])){
				redirect('admin/');
			}
			if(in_array(2, $user_data['user_type'])){
				redirect('generate/');
			}
			if(in_array(3, $user_data['user_type'])){
				redirect('back-office/');
			}
			if(in_array(4, $user_data['user_type'])){
				redirect('teamlead-agent/');
			}
			if(in_array(10, $user_data['user_type'])){
				redirect('teamlead-csr/');
			}
			if(in_array(5, $user_data['user_type'])){
				redirect('telesale/');
			}
			if(in_array(6, $user_data['user_type'])){
				redirect('csr/');
			}
			if(in_array(7, $user_data['user_type'])){
				redirect('dse/');
			}
			//redirect('/');
		}

		//$this->header_view = 'back_office/templates/header';
		$this->header_view = 'templates/header';
		$this->footer_view = 'templates/footer';
	}

}

class DSE_Controller extends Auth_Controller {

	protected $header_data;
	protected $footer_data;

	public function __construct() {
		parent::__construct();
		$this->load->model('users_model');
		//echo "PArent constructor<br>";
		//echo "Admin Controller<br>";exit;

		if ($this->users_model->is_dse() !== true) {
			$user_data = $this->session->userdata('user_data');
			//echo "<pre>"; print_r($user_data); echo "</pre>";exit;
			if(in_array(1, $user_data['user_type'])){
				redirect('admin/');
			}
			if(in_array(2, $user_data['user_type'])){
				redirect('generate/');
			}
			if(in_array(3, $user_data['user_type'])){
				redirect('back-office/');
			}
			if(in_array(4, $user_data['user_type'])){
				redirect('teamlead-agent/');
			}
			if(in_array(10, $user_data['user_type'])){
				redirect('teamlead-csr/');
			}
			if(in_array(5, $user_data['user_type'])){
				redirect('telesale/');
			}
			if(in_array(6, $user_data['user_type'])){
				redirect('csr/');
			}
			if(in_array(7, $user_data['user_type'])){
				redirect('dse/');
			}
			//redirect('/');
		}

		//$this->header_view = 'back_office/templates/header';
		$this->header_view = 'templates/header';
		$this->footer_view = 'templates/footer';
	}

}
