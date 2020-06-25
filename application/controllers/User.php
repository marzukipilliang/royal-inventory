<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	private $data;

	function __construct()
	{
		parent::__construct();
		$this->data['admin'] = checkLogin();
		$this->data['active'] = 'user';
		$this->load->model('m_user');
		$this->load->helper('string');

	} 

	function index()
	{
		$this->load->view('sidebar', $this->data);
		$this->load->view('user/view_user', $this->data);
		$this->load->view('foot', $this->data);
	}
	
	function add()
	{	
	
		$this->load->view('user/add_user', $this->data);
		$this->load->view('js_form');
		
	}

	function edit($id = null)
	{	
		
		$this->load->library('mycrud', array('tblname' => 'ms_user'));
		$this->data['user'] = $this->mycrud->getById('user_id', $id);
		
		$this->load->view('user/edit_user', $this->data);
		$this->load->view('js_form');
		
	}

	function delete($id = null)
	{	
		
		$this->data['id'] = $id;
		$this->data['cntl'] = 'APIUser';
		$this->load->view('trash_form', $this->data);
		$this->load->view('js_form');
	}

}
