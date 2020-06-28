<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stok extends CI_Controller {
	private $data;

	function __construct()
	{
		parent::__construct();
        $this->data['active'] = 'stok';
		$this->load->model('m_transaksi');
        $this->load->model('m_stok');
		
	} 

	function index()
	{
		
		$this->data['gudang_id'] = 1;
		$gd = $this->m_transaksi->getGudang();
		if ($gd) $this->data['gudang_id'] = $gd[0]->gudang_id;
		if (isset($_GET['gudang_id'])) $this->data['gudang_id'] = $_GET['gudang_id'];
		
		$this->data['gudang'] = $gd;
		
		$this->load->view('sidebar', $this->data);
		$this->load->view('stok/view_stok', $this->data);
		$this->load->view('foot', $this->data);
	}
	
}
