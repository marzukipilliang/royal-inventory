<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Flowchart extends CI_Controller {
	private $data;

	function __construct()
	{
		parent::__construct();
		$this->data['active'] = 'flowchart';
	} 

	function index()
	{
		$this->load->view('sidebar', $this->data);
		$this->load->view('config/view_flowchart', $this->data);
		$this->load->view('foot', $this->data);
	}
	

}
