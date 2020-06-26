<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {
	private $data;

	function __construct()
	{
		parent::__construct();
        $this->data['active'] = 'produk';
        $this->load->library('mycrud', array('tblname' => 'm_produk'));
	} 

	function index()
	{
		$this->load->view('sidebar', $this->data);
		$this->load->view('produk/view_produk', $this->data);
		$this->load->view('foot', $this->data);
	}
	
	function add()
	{	
	
        $this->load->view('produk/add_produk', $this->data);
		$this->load->view('js_form');
        
	}

	function edit($id = null)
	{	
		$this->data['satuan'] = $this->mycrud->getById('satuan_id', $id);
		
		$this->load->view('satuan/edit_satuan', $this->data);
		$this->load->view('js_form');
        
	}

}
