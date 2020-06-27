<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_produk extends CI_Model {
	private $table_name = "m_produk";

	function getAllProduk(){
		$this->db->select("a.*, COALESCE((SELECT 1 FROM m_konversi WHERE produk_id=a.produk_id ORDER BY konversi LIMIT 1),0) AS is_active");
		$query  = $this->db->get($this->table_name. " a");
		return $query->result();
	}
	

	function getById($id){
		$this->db->select("a.*, COALESCE((SELECT satuan_id FROM m_konversi WHERE produk_id=a.produk_id ORDER BY konversi LIMIT 1),0) AS satuan_id");
		$this->db->where("a.produk_id", $id);
		$query  = $this->db->get($this->table_name. " a");
		return $query->row();
	}
	
	function getByKode($kode){
		$this->db->where("kode", $kode);
		$query  = $this->db->get($this->table_name);
		return $query->row();
	}
	
	function getAllKonversi($id){
		$this->db->select("a.*, b.nm_satuan");
		$this->db->join("m_satuan b","b.satuan_id=a.satuan_id");
		$this->db->where("a.produk_id", $id);
		$query  = $this->db->get("m_konversi a" );
		return $query->result();
	}
	
	function getKonversi($produk_id, $satuan_id){
		$this->db->where("produk_id", $produk_id);
		$this->db->where("satuan_id", $satuan_id);
		$query  = $this->db->get("m_konversi" );
		return $query->row();
		
	}
	
	function insertKonversi($object){
		$query = $this->db->insert("m_konversi", $object);
		return TRUE;
	}
	
	function updateKonversi($produk_id, $satuan_id, $object) {
		$this->db->where("produk_id", $produk_id);
		$this->db->where("satuan_id", $satuan_id);
		$this->db->update("m_konversi", $object); 
		return $this->db->affected_rows();	

	}
	
	function deleteKonversi($produk_id, $satuan_id) {
		$this->db->where("produk_id", $produk_id);
		$this->db->where("satuan_id", $satuan_id);
		$this->db->delete("m_konversi"); 
		return $this->db->affected_rows();	

	}
	
	function getSatuanById($id){
		$this->db->where("satuan_id", $id);
		$query  = $this->db->get("m_satuan" );
		return $query->row();
	}
}
