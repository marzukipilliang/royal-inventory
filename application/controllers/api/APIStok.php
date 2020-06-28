<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class APIStok extends REST_Controller {
	
			
	function __construct()
	{
		parent::__construct();	
		$this->load->model('m_stok');
		$this->load->model('m_produk');
	} 
	
	// View Data
	function view_get()
    {
		
		$rs = $this->m_stok->getByGudang($this->get('gudang_id'));
		if ($rs)
		{
			// Set the response and exit
			$this->response($rs, REST_Controller::HTTP_OK); 
		}
		else
		{
			// Set the response and exit
			$this->response(array(), 200);
		}
       
    }
	
	function balance_get()
    {
		
		$rs = $this->m_stok->getBalance($this->get('periode'), $this->get('gudang_id'));
		if ($rs)
		{
			// Set the response and exit
			$this->response($rs, REST_Controller::HTTP_OK); 
		}
		else
		{
			// Set the response and exit
			$this->response(array(), 200);
		}
       
    }
	

}
