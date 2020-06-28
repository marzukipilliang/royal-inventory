<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class APITransfer extends REST_Controller {
	
	function __construct()
	{
		parent::__construct();	
		$this->load->model('m_produk');
		$this->load->model('m_transaksi');
		$this->load->model('m_stok');
		
	} 
	
	function add_get()
    {
		$gudang_id = $this->get('gudang_id');
		$produk_id = $this->get('produk_id');
		$qty = $this->get('qty');
		
		if ($qty <= 0){
			$this->response(array('success' => FALSE, 'message' => 'Qty minimal 1!'), 200);
		}
		
		$prod = $this->m_produk->getById($produk_id);
		
		if ($prod->satuan_id == 0){
			$this->response(array('success' => FALSE, 'message' => 'Produk ini belum ada konversi satuan!'), 200);	
		}
		
		$stok = $this->m_stok->getById($gudang_id, $produk_id);
		if (!$stok){
			$this->response(array('success' => FALSE, 'message' => 'Produk ini belum ada stok!'), 200);
			
		}else {
			if ($stok->qty <= 0 || $qty > $stok->qty){
				$this->response(array('success' => FALSE, 'message' => 'Stok:'.$stok->qty.' tidak mencukupi!'), 200);
			}
		}
		
		
		$object['produk_id'] = $produk_id;	
		$rs = $this->m_transaksi->getTempById($produk_id);
		if ($rs){
			$object['qty'] = $rs->qty + $qty;
			if ($object['qty'] > $stok->qty){
				$this->response(array('success' => FALSE, 'message' => 'Stok:'.$stok->qty.' tidak mencukupi!'), 200);
			}
			$id = $this->m_transaksi->updateTemp($rs->temp_id, $object);
			
		}else {
			$object['qty'] = $qty;
			$id = $this->m_transaksi->insertTemp($object);
		}
		
		if ($id){
			$this->response(array('success' => TRUE, 'message' => 'Berhasil tambah data!') , 200);
			
		}else {
			$this->response(array('success' => FALSE, 'message' => 'Data tidak bisa diinput!'), 200);
			
		}
		
    }
	
	function proses_get(){
		if (!$this->get('gudang_id')){
			$this->response(array('success' => FALSE, 'message' => 'Belum ada Gudang!'), 200);
		}
		
		if (!$this->get('tujuan_id')){
			$this->response(array('success' => FALSE, 'message' => 'Belum ada Tujuan!'), 200);
		}
		
		$temp = $this->m_transaksi->getAllTemp();
		if (!$temp){
			$this->response(array('success' => FALSE, 'message' => 'Masukkan item dahulu!'), 200);
		}
		
		$out = $this->m_transaksi->getMutasiByTipe('OUT');
		$in = $this->m_transaksi->getMutasiByTipe('IN');
		
		$kirim = array(
			'gudang_id' => $this->get('gudang_id'),
			'mutasi_id' => $out->mutasi_id,
			'tanggal' => date('Y-m-d'),
			'tujuan_id' => $this->get('tujuan_id')
		);
		
		$outid = $this->m_transaksi->insertHeader($kirim);
		if ($outid){
			
			$terima = array(
				'gudang_id' => $this->get('tujuan_id'),
				'mutasi_id' => $in->mutasi_id,
				'tanggal' => date('Y-m-d'),
				'ref_id' => $outid
			);
			$inid = $this->m_transaksi->insertHeader($terima);
			
			foreach ($temp as $items){
				$dtout = array(
					'transaksi_id' => $outid,
					'produk_id' => $items->produk_id,
					'qty' => $items->qty
				);
				$this->m_transaksi->insertDetail($dtout);
				// stok masuk
				$this->m_stok->updateStok($this->get('gudang_id'), $items->produk_id, $items->qty * -1);
				// balance
				$this->m_stok->updateBalance(date('Ym'), $this->get('gudang_id'), $items->produk_id, 'KELUAR', $items->qty);
				
				
				$dtin = array(
					'transaksi_id' => $inid,
					'produk_id' => $items->produk_id,
					'qty' => $items->qty
				);
				$this->m_transaksi->insertDetail($dtin);
				// stok keluar
				$this->m_stok->updateStok($this->get('tujuan_id'), $items->produk_id, $items->qty);
				// balance
				$this->m_stok->updateBalance(date('Ym'), $this->get('tujuan_id'), $items->produk_id, 'MASUK', $items->qty);
			}
			
			$this->m_transaksi->deleteAllTemp();
			$this->response(array('success' => TRUE, 'message' => 'Diproses dengan nomor kirim no.'.$outid. ' and terima no.'.$inid), 200);
			
		}else {
			$this->response(array('success' => FALSE, 'message' => 'Header tidak terbentuk!'), 200);
			
		}
		
	}
	
}
