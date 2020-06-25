<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class APIUserGroup extends REST_Controller {
	
	function __construct()
	{
		parent::__construct();	
		//Load CRUD Library
		$this->load->library('mycrud', array('tblname' => 'm_user_group'));
	
	} 
	
	// Insert Data
	function add_post()
    {
        if(!$this->post('group_name'))
        {
			$this->response(array('success' => FALSE, 'message' => 'Group Name masih kosong'), 200);
        }
        
		$row = $this->mycrud->getById('group_name', $this->post('group_name'));
		if (empty($row)){
			$object = array(
					'group_name' => trim($this->post('group_name')),
                    'allow_insert' => (int) $this->post('allow_insert'),
                    'allow_update' => (int) $this->post('allow_update'),
                    'allow_delete' => (int) $this->post('allow_delete'),
                    'allow_report' => (int) $this->post('allow_report'),
                    'allow_approve' => (int) $this->post('allow_approve'),
					'is_active' => (int) $this->post('is_active')
				);

			$id = $this->mycrud->createData($object);
			if (!empty($id)){
                $this->response(array('success' => TRUE, 'message' => 'Insert berhasil!'), 200);
                			
			}else {
				$this->response(array('success' => FALSE, 'message' => 'Data tidak dapat diinput!'), 200);
			}

		}else {
			$this->response(array('success' => FALSE, 'message' => $this->post('group_name'). ' sudah pernah diinput!'), 200);
		}

		
    }
	
	
	// Edit Data
	function edit_post()
    {
		if(!$this->post('group_name'))
        {
			$this->response(array('success' => FALSE, 'message' => 'Group Name masih kosong'), 200);
        }
        
        $object = array(
            'group_name' => trim($this->post('group_name')),
            'allow_insert' => (int) $this->post('allow_insert'),
            'allow_update' => (int) $this->post('allow_update'),
            'allow_delete' => (int) $this->post('allow_delete'),
            'allow_report' => (int) $this->post('allow_report'),
            'allow_approve' => (int) $this->post('allow_approve'),
            'is_active' => (int) $this->post('is_active')
        );

		$id = $this->mycrud->updateData('user_group_id', $this->post('id'), $object);
		if (!empty($id)){
			$this->response(array('success' => TRUE, 'message' => 'Edit berhasil!'), 200);			
		
		}else {
    		$this->response(array('success' => FALSE, 'message' => 'Data tidak bisa diedit'), 200);
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
