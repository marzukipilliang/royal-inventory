<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class APISatuan extends REST_Controller {
	
	function __construct()
	{
		parent::__construct();	
		//Load CRUD Library
		$this->load->library('mycrud', array('tblname' => 'm_satuan'));
	
	} 
	
	// Insert Data
	function add_post()
    {
        if(!$this->post('nm_satuan'))
        {
			$this->response(array('success' => FALSE, 'message' => 'Nama Satuan masih kosong'), 200);
        }
        
		$row = $this->mycrud->getById('nm_satuan', $this->post('nm_satuan'));
		if (empty($row)){
			$object = array(
					'nm_satuan' => strtoupper(trim($this->post('nm_satuan')))
				);

			$id = $this->mycrud->createData($object);
			if (!empty($id)){
                $this->response(array('success' => TRUE, 'message' => 'Insert berhasil!'), 200);
                			
			}else {
				$this->response(array('success' => FALSE, 'message' => 'Data tidak dapat diinput!'), 200);
			}

		}else {
			$this->response(array('success' => FALSE, 'message' => $this->post('nm_satuan'). ' sudah pernah diinput!'), 200);
		}

		
    }
	
	
	// Edit Data
	function edit_post()
    {
		if(!$this->post('nm_satuan'))
        {
			$this->response(array('success' => FALSE, 'message' => 'Nama Satuan masih kosong'), 200);
        }
        
        $object = array(
					'nm_satuan' => strtoupper(trim($this->post('nm_satuan'))),
					'date_updated' => date('Y-m-d H:i:s')
				);
		$row = $this->mycrud->getById('nm_satuan', $this->post('nm_satuan'));
		if (empty($row)){
			
			$id = $this->mycrud->updateData('satuan_id', $this->post('id'), $object);
			if (!empty($id)){
				$this->response(array('success' => TRUE, 'message' => 'Edit berhasil!'), 200);			
			
			}else {
				$this->response(array('success' => FALSE, 'message' => 'Data tidak bisa diedit'), 200);
			}
		
		}else {
			$this->response(array('success' => FALSE, 'message' => $this->post('nm_satuan'). ' tidak berubah atau sudah pernah diinput!'), 200);
		}
    }
	
	// View Data
	function view_get()
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
	

}
