<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class CRM_Exceptions extends CI_Exceptions {

    function __construct() {
        parent::__construct();
        error_reporting('E_ALL');
    }

    function show_404($page = '', $log_error = true) { // error page logic
        header("HTTP/1.0 404 Not Found");
        $CI = & get_instance();

        $data = array();
        $data['main_content'] = 'errors/error_404';

        //$CI->load->model('content_model');
        //$CI->load->model('site_banner_model');

        $current_url = current_url();
        $url = substr($current_url, 1);
        $file_name = $this->selfURL();
        $this->redirect_404($file_name);
        //$data['meta'] = $CI->content_model->get_content($url);

        //$data['content_categories'] = $CI->content_model->get_content_categories();
        //$data['footer_navigation'] = $CI->content_model->get_footer_navigation();
        //$data['footer_navigation'] = $CI->content_model->get_footer_navigation(2);
        //$data['footer_navigation1'] = $CI->content_model->get_footer_navigation(3);
        //$data['footer_navigation2'] = $CI->content_model->get_footer_navigation(4);

        /* $no_banner_page = array('properties');
          //$no_banner_page_uri1 = array('dashboard');
          $uriContent = $this->uri->segment(1);

          $data['banner_image'] = $CI->site_banner_model->get_banner($uriContent);
        $data['searchBar_content'] = $CI->content_model->get_tooltip_content(1); 

        echo $CI->load->view('templates/header', $data, true);
        echo $CI->load->view('templates/error_404', $data, true);
        echo $CI->load->view('templates/footer', $data, true);*/
        echo $CI->output->get_output();
        exit;
    }

    private function redirect_404($page = '', $log_error = true) {
        if (false !== strpos($page, 'contact?request_id')) {
            header('Location:http://www.araam.pk', true, 301);
            exit();
        }
    }

    private function selfURL() {
        $s = empty($_SERVER["HTTPS"]) ? '' : ($_SERVER["HTTPS"] == "on") ? "s" : "";
        $protocol = $this->strleft(strtolower($_SERVER["SERVER_PROTOCOL"]), "/") . $s;
        $port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":" . $_SERVER["SERVER_PORT"]);
        return $protocol . "://" . $_SERVER['SERVER_NAME'] . $port . $_SERVER['REQUEST_URI'];
    }

    private function strleft($s1, $s2) {
        return substr($s1, 0, strpos($s1, $s2));
    }

}

?>