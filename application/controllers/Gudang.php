<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gudang extends CI_Controller {
	private $data;

	function __construct()
	{
		parent::__construct();
        $this->data['active'] = 'gudang';
        $this->load->library('mycrud', array('tblname' => 'm_gudang'));
	} 

	function index()
	{
		$this->load->view('sidebar', $this->data);
		$this->load->view('gudang/view_gudang', $this->data);
		$this->load->view('foot', $this->data);
	}
	
	function add()
	{	
	
        $this->load->view('gudang/add_gudang', $this->data);
		$this->load->view('js_form');
        
	}

	function edit($id = null)
	{	
		$this->data['gudang'] = $this->mycrud->getById('gudang_id', $id);
		
		$this->load->view('gudang/edit_gudang', $this->data);
		$this->load->view('js_form');
        
	}

}
