<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_transaksi extends CI_Model {
	
	function getGudang(){
		$query  = $this->db->get("m_gudang");
		return $query->result();
		
	}
	
	function getMutasiByTipe($tipe){
		$this->db->where("tipe", $tipe);
		$query  = $this->db->get("m_mutasi");
		return $query->row();
		
	}

	function insertHeader($object){
		$this->db->insert("transaksi_header", $object);
		return $this->db->insert_id();	
	}
	
	function insertDetail($object){
		$this->db->insert("transaksi_detail", $object);
	}
	
	
	function insertTemp($object){
		$this->db->insert("t_temp", $object);
		return $this->db->insert_id();	
	}
	
	function updateTemp($id, $object){
		$this->db->where("temp_id", $id);
		$this->db->update("t_temp", $object);
		return $this->db->affected_rows();	
	}
	
	function deleteAllTemp(){
		$this->db->empty_table("t_temp");
		return $this->db->affected_rows();	
	}
	
	function deleteTempById($id){
		$this->db->where("temp_id", $id);
		$this->db->delete("t_temp");
		return $this->db->affected_rows();	
	}
	
	function getAllTemp(){
		$this->db->select("a.*, b.nm_produk");
		$this->db->join("m_produk b", "b.produk_id=a.produk_id");
		$query  = $this->db->get("t_temp a");
		return $query->result();
	}
	
	function getTempById($id){
		$this->db->select("a.*, b.nm_produk");
		$this->db->join("m_produk b", "b.produk_id=a.produk_id");
		$this->db->where("a.produk_id", $id);
		$query  = $this->db->get("t_temp a");
		return $query->row();
	}
	
	function getTransaksiByTipe($tipe, $awal, $akhir){
		$this->db->select("a.*, b.nm_gudang, c.nm_mutasi, (SELECT nm_gudang FROM m_gudang WHERE gudang_id=a.tujuan_id LIMIT 1) AS tujuan");
		$this->db->join("m_gudang b", "b.gudang_id=a.gudang_id");
		$this->db->join("m_mutasi c", "c.mutasi_id=a.mutasi_id");
		$this->db->where("c.tipe", $tipe);
		$this->db->where("a.tanggal >=", $awal);
		$this->db->where("a.tanggal <=", $akhir);
		$query  = $this->db->get("transaksi_header a");
		return $query->result();
		
	}
	
	function getTranferByPeriode($awal, $akhir){
		$this->db->select("a.*, b.nm_gudang, c.tipe, c.nm_mutasi, (SELECT nm_gudang FROM m_gudang WHERE gudang_id=a.tujuan_id LIMIT 1) AS tujuan");
		$this->db->join("m_gudang b", "b.gudang_id=a.gudang_id");
		$this->db->join("m_mutasi c", "c.mutasi_id=a.mutasi_id");
		$this->db->where_not_in("c.tipe", "ADJ");
		$this->db->where("a.tanggal >=", $awal);
		$this->db->where("a.tanggal <=", $akhir);
		$query  = $this->db->get("transaksi_header a");
		return $query->result();
		
	}
	
	function getTransaksiById($id){
		$this->db->select("a.*, b.nm_gudang, c.tipe, c.nm_mutasi, (SELECT nm_gudang FROM m_gudang WHERE gudang_id=a.tujuan_id LIMIT 1) AS tujuan");
		$this->db->join("m_gudang b", "b.gudang_id=a.gudang_id");
		$this->db->join("m_mutasi c", "c.mutasi_id=a.mutasi_id");
		$this->db->where("a.transaksi_id", $id);
		$query  = $this->db->get("transaksi_header a");
		return $query->row();
		
	}
	
	function getDetailById($id){
		$this->db->select("a.*, b.nm_produk, (SELECT y.nm_satuan FROM m_konversi x JOIN m_satuan y ON y.satuan_id=x.satuan_id WHERE x.produk_id=a.produk_id ORDER BY x.konversi LIMIT 1) AS nm_satuan");
		$this->db->join("m_produk b", "b.produk_id=a.produk_id");
		$this->db->where("a.transaksi_id", $id);
		$query  = $this->db->get("transaksi_detail a");
		return $query->result();
	}
	
	function getSoalSatu(){
		$query = $this->db->query($this->querySQL());
		return $query->result();
	}
	
	function querySQL(){
		$sql = "SELECT m.nm_gudang,n.periode,n.kode,n.nm_produk,n.brpx_keluar FROM m_gudang m join(
				SELECT
					row_number() OVER (partition by gudang_id, TO_CHAR(b.tanggal, 'YYYYMM') ORDER BY count(*) DESC),
					b.gudang_id,
					TO_CHAR(b.tanggal, 'YYYYMM') AS periode,
					c.kode, c.nm_produk, 
					count(*) as brpx_keluar
				FROM transaksi_detail a
				JOIN transaksi_header b ON b.transaksi_id=a.transaksi_id 
				JOIN m_produk c ON c.produk_id=a.produk_id
				WHERE EXISTS(SELECT 1 FROM m_mutasi x WHERE mutasi_id=b.mutasi_id AND x.tipe='OUT')
				GROUP BY b.gudang_id, TO_CHAR(b.tanggal, 'YYYYMM') , c.kode, c.nm_produk 
				ORDER BY count(*) DESC 
			)n ON n.gudang_id=m.gudang_id 
			WHERE row_number <= 10
			ORDER BY nm_gudang, periode, brpx_keluar DESC";
			
		return $sql;
	}
}
