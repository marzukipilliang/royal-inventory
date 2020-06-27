<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adjustment extends CI_Controller {
	private $data;

	function __construct()
	{
		parent::__construct();
        $this->data['active'] = 'adjust';
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
		$this->load->view('adjust/view_adjust', $this->data);
		$this->load->view('foot', $this->data);
	}
	
	function add()
	{	
		$this->data['gudang'] = $this->m_transaksi->getGudang();
		$this->data['produk'] = $this->m_produk->getAllProduk();
        $this->load->view('adjust/add_adjust', $this->data);
		$this->load->view('js_form');
        
	}

	function detail($id = null)
	{
		$this->data['adjust'] = $this->m_transaksi->getTransaksiById($id);
        $this->load->view('adjust/detail_adjust', $this->data);
	}

}
