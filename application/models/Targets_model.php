<?php
class Targets_model extends CRM_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_managers()
    {
        $this->db->select("id")->from("user_types");
        $this->db->where("user_type","manager");
        $manager_id = $this->db->get();
        $man_id = $manager_id->result_array();
        $id = $man_id[0]['id'];
        $this->db->select("users.*,users_role.role_id,t.target_value")->from("users");
        $this->db->join("users_role", "users_role.user_id = users.id",'inner');
        $this->db->join("targets as t", "users.id = t.user_id",'left');
        $this->db->where("role_id", $id);
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }

    public function get_tl_dse_tele()
    {
        $this->db->select("*")->from("user_types");
        $this->db->where("user_type","TL Telesales");
        $this->db->or_where("user_type","TL DSE");
        $manager_id = $this->db->get();
        $man_id = $manager_id->result_array();

        return $man_id; 
    }

    public function get_teamleads($team_id)
    {
        $current_manager = $this->session->userdata("user_data");
        $current_manager_id = $current_manager['id'];
        $this->db->select("users.*,users_role.role_id,t.target_value")->from("users");
        $this->db->join("users_role", "users_role.user_id = users.id",'inner');
        $this->db->join("targets as t", "users.id = t.user_id",'left');
        $this->db->where("role_id", $team_id);
        $this->db->where("users.manager_id", $current_manager_id);
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }

    public function get_teammember_by_type($type_id)
    {
        $user_data = $this->session->userdata("user_data");
        $this->db->select("users.*,users_role.role_id,t.target_value")->from("users");
        $this->db->join("users_role", "users_role.user_id = users.id",'inner');
        $this->db->join("employees as emp", "emp.tsa_id = users.id",'inner');
        $this->db->join("targets as t", "users.id = t.user_id",'left');
        $this->db->where("role_id", $type_id);
        $this->db->where("emp.teamlead_id", $user_data['id']);
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }

    public function add($data)
    {
        $now = date('Y-m-d H:i:s');
        $user_data = $this->session->userdata('user_data');
        $insert_data = array('user_id'=>$data['user_id'],'target_value'=>$data['target'],'added_by'=>$user_data['id'],'added_at'=> $now);
        $this->db->insert('targets',$insert_data);
        return true;
    }

    public function update($data)
    {
        $now = date('Y-m-d H:i:s');
        $user_data = $this->session->userdata('user_data');
        $update_data = array('target_value'=>$data['target'],'updated_by'=>$user_data['id'],'updated_at'=> $now);
        $user_id = $data['user_id'];
        $this->db->where('user_id',$user_id);
        $this->db->update('targets',$update_data);
        return true;
    }

    public function get_target_by_user_id($user_id)
    {
        $this->db->select("*")->from("targets");
        $this->db->where("user_id",$user_id);
        $user_target = $this->db->get();
        $target = $user_target->result_array();
        return $target;
    }
}   