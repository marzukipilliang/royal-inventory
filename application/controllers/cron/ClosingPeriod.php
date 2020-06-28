<?php defined('BASEPATH') OR exit('No direct script access allowed');
class ClosingPeriod extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();	
		$this->load->model('m_produk');
		$this->load->model('m_transaksi');
		$this->load->model('m_stok');
	} 
	
	function index(){
		$gudang = $this->m_transaksi->getGudang();
		foreach ($gudang as $g):
			$produk = $this->m_produk->getAllProduk();
			foreach ($produk as $p):
				// balance
				$this->m_stok->updateBalance(date('Ym'), $g->gudang_id, $p->produk_id, 'ADJUST', 0);
				echo date('Ym').' '.$g->gudang_id.' '.$p->produk_id.PHP_EOL;
			endforeach;
		endforeach;
	}
	
}
