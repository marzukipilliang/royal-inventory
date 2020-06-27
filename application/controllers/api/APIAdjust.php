<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class APIAdjust extends REST_Controller {
	
	function __construct()
	{
		parent::__construct();	
		$this->load->model('m_produk');
		$this->load->model('m_transaksi');
	
	} 
	
	// Insert Data
	function add_get()
    {
		
		$produk_id = $this->get('produk_id');
		$qty = $this->get('qty');
		
		
		$prod = $this->m_produk->getById($produk_id);
		
		if ($prod->satuan_id == 0){
			$this->response(array('success' => FALSE, 'message' => 'Produk ini belum ada konversi satuan!'), 200);	
		}
		
		$object['produk_id'] = $produk_id;	
		
		$rs = $this->m_transaksi->getTempById($produk_id);
		if ($rs){
			$object['qty'] = $rs->qty + $qty;
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
	
	
	function delete_post(){
		$id = $this->post('temp_id');
		if ($this->m_transaksi->deleteTempById($id)){
			$this->response(array('success' => TRUE, 'message' => 'Berhasil dihapus!'), 200);
			
		}else {
			$this->response(array('success' => FALSE, 'message' => 'Data tidak bisa dihapus!'), 200);
			
		}
		
	}
	
	// View Data
	function view_get()
    {
		
		$rs = $this->m_transaksi->getAllTemp();
		if ($rs)
		{
			// Set the response and exit
			$this->response($rs, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
		}
		else
		{
			// Set the response and exit
			$this->response([
				'success' => FALSE,
				'message' => 'No data were found'
			], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
		}
       
    }
	
	function delete_temp_get(){
		if ($this->m_transaksi->deleteAllTemp()){
			$this->response(array('success' => TRUE, 'message' => 'Berhasil dihapus!'), 200);
			
		}else {
			$this->response(array('success' => FALSE, 'message' => 'Data tidak bisa dihapus!'), 200);
			
		}
	}

	function proses_get(){
		if (!$this->get('gudang_id')){
			$this->response(array('success' => FALSE, 'message' => 'Belum ada Gudang!'), 200);
		}
		
		$temp = $this->m_transaksi->getAllTemp();
		if (!$temp){
			$this->response(array('success' => FALSE, 'message' => 'Masukkan item dahulu!'), 200);
		}
		
		$mutasi = $this->m_transaksi->getMutasiByTipe('ADJ');
		
		$header = array(
			'gudang_id' => $this->get('gudang_id'),
			'mutasi_id' => $mutasi->mutasi_id,
			'tanggal' => date('Y-m-d'),
			'tujuan_id' => $this->get('gudang_id')
		);
		
		$id = $this->m_transaksi->insertHeader($header);
		
		if ($id){
			foreach ($temp as $items){
				$detail = array(
					'transaksi_id' => $id,
					'produk_id' => $items->produk_id,
					'qty' => $items->qty
				);
				$this->m_transaksi->insertDetail($detail);	
			}
			$this->m_transaksi->deleteAllTemp();
			$this->response(array('success' => TRUE, 'message' => 'Sukses diproses dengan nomor '.$id), 200);
			
		}else {
			$this->response(array('success' => FALSE, 'message' => 'Header tidak terbentuk!'), 200);
			
		}
		
	}
	
}
