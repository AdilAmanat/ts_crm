<?php

class Targets extends CRM_Controller {

    function __construct() {
        parent::__construct();
        //$this->output->enable_profiler(TRUE);
    }

    public function index() {
        $user_data = $this->session->userdata('user_data');
        $this->load->model("targets_model");
        if(in_array(15, $user_data['user_type']))
        {    
        	$managers = $this->targets_model->get_managers();
        	$data['managers'] = $managers;
            $this->load->view('admin/targets/index',$data);
        }
        if(in_array(9, $user_data['user_type']))
        {
            $team_leads = $this->targets_model->get_tl_dse_tele();
            $data['team_leads'] = $team_leads;
            $data['team_members'] = array();
            if($this->input->post())
            {
                $post_data = $this->input->post();
                $team_lead_type = $post_data['team_lead_type'];
               $data['team_members'] = $this->targets_model->get_teamleads($team_lead_type);
               //echo "<pre>";print_r($data['team_members']);
            }
            //echo "<pre>";print_r($data);die();
            $this->load->view('admin/targets/manager_index',$data);
        }
        if (in_array(4, $user_data['user_type'])) {
            $tele_team = $this->targets_model->get_teammember_by_type(5);    //5 for telesale agent
            $data['tele_agent'] = $tele_team;
            $this->load->view('admin/targets/tl_tele_index',$data);
        }
        if (in_array(11, $user_data['user_type'])) {
            $tele_team = $this->targets_model->get_teammember_by_type(7);    //7 for DSE agent
            $data['tele_agent'] = $tele_team;
            $this->load->view('admin/targets/tl_tele_index',$data);
        }    
    }

    public function add()
    {
    	if($this->input->post())
    	{
    		$post_data = $this->input->post();
    		$this->load->model("targets_model");
    		$resp = $this->targets_model->add($post_data);
    		if($resp)
    		{
    			echo "1";
    		}
    	}
    }

    public function update()
    {
    	if($this->input->post())
    	{
    		$post_data = $this->input->post();
    		$this->load->model("targets_model");
    		$resp = $this->targets_model->update($post_data);
    		if($resp)
    		{
    			echo "1";
    		}
    	}
    }
}
