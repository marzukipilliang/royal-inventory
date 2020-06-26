<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Satuan extends CI_Controller {
	private $data;

	function __construct()
	{
		parent::__construct();
        $this->data['active'] = 'satuan';
        $this->load->library('mycrud', array('tblname' => 'm_satuan'));
	} 

	function index()
	{
		$this->load->view('sidebar', $this->data);
		$this->load->view('satuan/view_satuan', $this->data);
		$this->load->view('foot', $this->data);
	}
	
	function add()
	{	
	
        $this->load->view('satuan/add_satuan', $this->data);
		$this->load->view('js_form');
        
	}

	function edit($id = null)
	{	
		$this->data['satuan'] = $this->mycrud->getById('satuan_id', $id);
		
		$this->load->view('satuan/edit_satuan', $this->data);
		$this->load->view('js_form');
        
	}

}
