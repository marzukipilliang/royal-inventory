<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_stok extends CI_Model {
	private $table_name = "m_stok";

	function getByGudang($gudang_id){
		$sql = 'SELECT a.*, b.nm_gudang, c.kode, c.nm_produk,(
					SELECT jsonb_agg(row)
								FROM (
									SELECT x.nm_satuan, y.konversi
									FROM m_konversi y
									INNER JOIN m_satuan x on x.satuan_id=y.satuan_id
									WHERE y.produk_id = a.produk_id
									ORDER BY y.konversi
								)row) as satuan 
					FROM t_stok a 
					INNER JOIN m_gudang b on b.gudang_id=a.gudang_id 
					INNER JOIN m_produk c on c.produk_id=a.produk_id
					WHERE a.gudang_id='.$gudang_id;
		$query = $this->db->query($sql);
		return $query->result();
	}

	function getById($gudang_id, $produk_id){
		$this->db->select("a.*, b.nm_gudang, c.kode, c.nm_produk");
		$this->db->join("m_gudang b","b.gudang_id=a.gudang_id");
		$this->db->join("m_produk c","c.produk_id=a.produk_id");
		$this->db->where("a.gudang_id", $gudang_id);
		$this->db->where("a.produk_id", $produk_id);
		$query  = $this->db->get("t_stok a" );
		return $query->row();
	}
	
	function updateStok($gudang_id, $produk_id, $qty){
		$rs = $this->getById($gudang_id, $produk_id);
		if ($rs){
			//Update
			$data['qty'] = $rs->qty + $qty;
			$data['date_updated'] = date('Y-m-d H:i:s');
			$this->db->where("gudang_id", $gudang_id);
			$this->db->where("produk_id", $produk_id);
			$this->db->update("t_stok", $data);	
			
		}else {
			//Insert
			$data = array(
				'gudang_id' => $gudang_id,
				'produk_id' => $produk_id,
				'qty' => $qty
			);
			$this->db->insert("t_stok", $data);	
		}
	}

	function getByPeriode($periode, $gudang_id, $produk_id){
		$this->db->select("a.*, b.nm_gudang, c.kode, c.nm_produk");
		$this->db->join("m_gudang b","b.gudang_id=a.gudang_id");
		$this->db->join("m_produk c","c.produk_id=a.produk_id");
		$this->db->where("a.periode", $periode);
		$this->db->where("a.gudang_id", $gudang_id);
		$this->db->where("a.produk_id", $produk_id);
		$query  = $this->db->get("t_balance a" );
		return $query->row();
	}
	

	function updateBalance($periode, $gudang_id, $produk_id, $tipe, $qty){
		$rs = $this->getByPeriode($periode, $gudang_id, $produk_id);
		if ($rs){
			//Update Balance
			switch ($tipe){
				case 'MASUK':
					$data['masuk'] = $rs->masuk + $qty;
					$data['akhir'] = $rs->akhir + $qty;
					break;
				
				case 'KELUAR':
					$data['keluar'] = $rs->keluar + $qty;
					$data['akhir'] = $rs->akhir - $qty;
					break;
				
				case 'ADJUST':
					$data['adjust'] = $rs->adjust + $qty;
					$data['akhir'] = $rs->akhir + $qty;
					break;
					
			}
			$data['date_updated'] = date('Y-m-d H:i:s');
			$this->db->where("periode", $periode);
			$this->db->where("gudang_id", $gudang_id);
			$this->db->where("produk_id", $produk_id);
			$this->db->update("t_balance", $data);	
			
		}else {
			//Insert Balance
	
			// Cek Last Month balance
			$lastmonth = date('Ym', strtotime('first day of previous month'));
			$row = $this->getByPeriode($lastmonth, $gudang_id, $produk_id);
			
			if ($row){
				$data['awal'] = $row->akhir;
				
			}else {
				$data['awal'] = 0;
		
			}
			$data['periode'] = $periode;
			$data['gudang_id'] = $gudang_id;
			$data['produk_id'] = $produk_id;
			switch ($tipe){
				case 'MASUK':
					$data['masuk'] = $qty;
					$data['akhir'] = $data['awal'] + $qty;
					break;
				
				case 'KELUAR':
					$data['keluar'] = $qty;
					$data['akhir'] = $data['awal'] + ($qty * -1);
					
					break;
				
				case 'ADJUST':
					$data['adjust'] = $qty;
					$data['akhir'] = $data['awal'] + $qty;
					break;
					
			}
			$this->db->insert("t_balance", $data);	
		}

	}

	function getBalance($periode, $gudang_id){
		$this->db->select("a.*, b.nm_gudang, c.kode, c.nm_produk");
		$this->db->join("m_gudang b","b.gudang_id=a.gudang_id");
		$this->db->join("m_produk c","c.produk_id=a.produk_id");
		$this->db->where("a.periode", $periode);
		$this->db->where("a.gudang_id", $gudang_id);
		$query  = $this->db->get("t_balance a" );
		return $query->result();
	}

}
