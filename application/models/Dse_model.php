<?php

class Dse_model extends CRM_Model {

    public function __construct() {
        parent::__construct();
    }
	
	
	public function get_dse_documents($status) {
		
		$this->db->select("*")->from("dse_documents_batch ddb");
		$this->db->where("dd.status", $status);
		$this->db->join("dse_documents dd", "ddb.dse_document_batch_id = dd.dse_document_batch_id");
		$query = $this->db->get();
		
		if($query->num_rows() > 0){
			$documents = $query->result_array();
		}
		return $documents;
	}

	public function update_dse_document($data, $id){
		$this->db->where("dse_document_id", $id);
		$this->db->update("dse_documents", $data);		
	}	
}
