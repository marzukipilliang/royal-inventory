<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mycrud {
	private $table_name; 
	private $CI;

	function __construct($params)
	{
        $this->CI =& get_instance();
        $this->table_name = $params['tblname'];
		
	}	

    /* Create */
	function createData($object) {	
		$this->CI->db->insert($this->table_name, $object);
		return $this->CI->db->insert_id();	
	
	}

    /* Read */
    function readData() {			
		$query  = $this->CI->db->get($this->table_name);
		return $query->result();
	
	}
	
    /* Update */
	function updateData($key, $value, $object) {
		$this->CI->db->where($key, $value);
		$this->CI->db->update($this->table_name, $object); 
		return $this->CI->db->affected_rows();	

	}

    /* Delete */
    function deleteData($key, $value) {
		$this->CI->db->where($key, $value);
		$this->CI->db->delete($this->table_name); 
		return $this->CI->db->affected_rows();	

	}

	/* Get By ID */
	function getById($key, $value) {
		$this->CI->db->where($key, $value);
		$query = $this->CI->db->get($this->table_name); 
		return $query->row();	

	}
	
}
		
