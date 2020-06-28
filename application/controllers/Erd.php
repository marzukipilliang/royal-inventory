<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Erd extends CI_Controller {
	private $data;

	function __construct()
	{
		parent::__construct();
		$this->data['active'] = 'erd';
	} 

	function index()
	{
		$this->load->view('sidebar', $this->data);
		$this->load->view('config/view_erd', $this->data);
		$this->load->view('foot', $this->data);
	}
	

}
