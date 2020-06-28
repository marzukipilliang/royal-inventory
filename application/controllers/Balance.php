<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Balance extends CI_Controller {
	private $data;

	function __construct()
	{
		parent::__construct();
        $this->data['active'] = 'balance';
		$this->load->model('m_transaksi');
        $this->load->model('m_stok');
		
	} 

	function index()
	{
		
		$this->data['gudang_id'] = 1;
		$gd = $this->m_transaksi->getGudang();
		if ($gd) $this->data['gudang_id'] = $gd[0]->gudang_id;
		if (isset($_POST['gudang_id'])) $this->data['gudang_id'] = $_POST['gudang_id'];
		
		$this->data['gudang'] = $gd;
		$this->data['periode'] = date('Ym');
		$this->load->view('sidebar', $this->data);
		$this->load->view('balance/view_balance', $this->data);
		$this->load->view('foot', $this->data);
	}
	
}
