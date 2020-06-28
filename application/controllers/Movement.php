<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Movement extends CI_Controller {
	private $data;

	function __construct()
	{
		parent::__construct();
		$this->data['active'] = 'movement';
	} 

	function index()
	{
		$this->load->view('sidebar', $this->data);
		$this->load->view('config/view_movement', $this->data);
		$this->load->view('foot', $this->data);
	}
	

}
