<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class APITransfer extends REST_Controller {
	
	function __construct()
	{
		parent::__construct();	
		$this->load->model('m_produk');
		$this->load->model('m_transaksi');
	
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
			
				$dtin = array(
					'transaksi_id' => $inid,
					'produk_id' => $items->produk_id,
					'qty' => $items->qty
				);
				$this->m_transaksi->insertDetail($dtin);	
			}
			
			$this->m_transaksi->deleteAllTemp();
			$this->response(array('success' => TRUE, 'message' => 'Diproses dengan nomor kirim no.'.$outid. ' and terima no.'.$inid), 200);
			
		}else {
			$this->response(array('success' => FALSE, 'message' => 'Header tidak terbentuk!'), 200);
			
		}
		
	}
	
}
