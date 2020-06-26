<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Config extends CI_Controller {
	private $data;

	function __construct()
	{
		parent::__construct();
		$this->data['active'] = 'config';
	} 

	function index()
	{
		$this->load->view('sidebar', $this->data);
		$this->load->view('config/view_config', $this->data);
		$this->load->view('foot', $this->data);
	}
	

}
