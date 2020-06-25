<?php defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('max_execution_time', 120);
ini_set('memory_limit','512M'); 

class Dashboard extends CI_Controller {
	private $data;

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_dashboard');
		$this->data['active'] = 'dashboard';
	} 
	
	function index()
	{
				
		$this->load->view('sidebar', $this->data);
		$this->load->view('body', $this->data);
		$this->load->view('foot', $this->data);
		
	}

	function login()
	{
		$this->load->view('login');		
	}
	
	function logout()
	{
		unset($_SESSION['admin']);
		$this->load->view('login');
		
	}


}
