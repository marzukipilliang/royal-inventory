<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_user extends CI_Model {
	private $table_name = "m_user";

	function getById($id){
		$this->db->where("user_id", $id);
		$query  = $this->db->get("ms_user");
		return $query->row();
	}
	
	
	function getByEmail($email){
		$this->select("a.*, b.group_name, b.allow_insert, b.b.allow_update, b.allow_delete, b.allow_report, b.allow_approve");
		$this->join("m_user_group b", "b.user_group_id=a.user_group_id");
		$this->db->where("a.is_active", 1);
		$this->db->where("a.email", $email);
		$query  = $this->db->get($this->table_name." a");
		return $query->row();
	}
			

	function insertEmailQueued($object){
		$query = $this->db->insert('email_queued', $object);
		return $this->db->insert_id();
	}
	
	
}
