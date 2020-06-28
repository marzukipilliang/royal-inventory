<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Satu extends CI_Controller {
	private $data;

	function __construct()
	{
		parent::__construct();
		$this->data['active'] = 'satu';
		$this->load->model('m_transaksi');
	} 

	function index()
	{
		$this->data['sql'] = $this->m_transaksi->querySQL();

		$this->load->view('sidebar', $this->data);
		$this->load->view('soal/view_satu', $this->data);
		$this->load->view('foot', $this->data);
	}
	

}
