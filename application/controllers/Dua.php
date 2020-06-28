<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dua extends CI_Controller {
	private $data;

	function __construct()
	{
		parent::__construct();
		$this->data['active'] = 'dua';
	} 

	function index()
	{
		$this->data['sql'] = "UPDATE t_mutasi_item_tahunan 
	SET saldo_awal=z.mutasi+n.on_stock
FROM t_mutasi_item_tahunan m
	JOIN (
			SELECT a.kode, CAST(a.tgl_transaksi AS VARCHAR(4)) AS tahun, SUM(a.[out]-a.[in]) AS mutasi
				FROM m_mutasi_item_2018 a
				GROUP BY a.kode, CAST(a.tgl_transaksi AS VARCHAR(4))
		)z ON z.kode=m.kode AND z.tahun=m.tahun
	JOIN m_item_stock n ON n.kode=z.kode";
	
		$this->load->view('sidebar', $this->data);
		$this->load->view('soal/view_dua', $this->data);
		$this->load->view('foot', $this->data);
	}
	

}
