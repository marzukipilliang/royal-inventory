<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class APITransaksi extends REST_Controller {
	
	function __construct()
	{
		parent::__construct();	
		//Load CRUD Library
		$this->load->model('m_transaksi');
	
	} 
	
	// View Data
	function view_get()
    {
		$tipe = $this->get('tipe');
		if ($tipe == 'ADJ'){	
			$rs = $this->m_transaksi->getTransaksiByTipe($tipe, $this->get('awal') , $this->get('akhir'));
		
		}else {
			$rs = $this->m_transaksi->getTranferByPeriode($this->get('awal') , $this->get('akhir'));
			
		}
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
	
	function detail_get()
    {
		$id = $this->get('id');
		$rs = $this->m_transaksi->getDetailById($id);
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
	

}
