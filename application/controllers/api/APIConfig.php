<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class APIConfig extends REST_Controller {
	
	function __construct()
	{
		parent::__construct();	
		//Load CRUD Library
		$this->load->library('mycrud', array('tblname' => 'm_mutasi'));
		$this->load->model('m_transaksi');
	} 
	
	// View Data
	function movement_get()
    {
		
		$rs = $this->mycrud->readData();
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
	

	function satu_get()
    {
		
		$rs = $this->m_transaksi->getSoalSatu();
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
