<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transfer extends CI_Controller {
	private $data;

	function __construct()
	{
		parent::__construct();
        $this->data['active'] = 'transfer';
        $this->load->model('m_produk');
		$this->load->model('m_transaksi');
		
	} 

	function index()
	{
		$this->data['awal'] = date('Y-m-01');
		$this->data['akhir'] = date('Y-m-d');
		
		if (isset($_POST['awal'])) $this->data['awal'] = $_POST['awal'];
		if (isset($_POST['akhir'])) $this->data['akhir'] = $_POST['akhir'];
		
		$this->load->view('sidebar', $this->data);
		$this->load->view('transfer/view_transfer', $this->data);
		$this->load->view('foot', $this->data);
	}
	
	function add()
	{	
		$this->data['gudang'] = $this->m_transaksi->getGudang();
		$this->data['produk'] = $this->m_produk->getAllProduk();
        $this->load->view('transfer/add_transfer', $this->data);
		$this->load->view('js_form');
        
	}

	function detail($id = null)
	{
		$this->data['transfer'] = $this->m_transaksi->getTransaksiById($id);
        $this->load->view('transfer/detail_transfer', $this->data);
	}

}
