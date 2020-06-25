<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserGroup extends CI_Controller {
	private $data;

	function __construct()
	{
		parent::__construct();
		$this->data['admin'] = checkLogin();
        $this->data['active'] = 'group';
        $this->load->library('mycrud', array('tblname' => 'm_user_group'));
	} 

	function index()
	{
		$this->load->view('sidebar', $this->data);
		$this->load->view('usergroup/view_user_group', $this->data);
		$this->load->view('foot', $this->data);
	}
	
	function add()
	{	
	
        $this->load->view('usergroup/add_user_group', $this->data);
        $this->load->view('js_checkbox');
		$this->load->view('js_form');
        
	}

	function edit($id = null)
	{	
		$this->data['group'] = $this->mycrud->getById('user_group_id', $id);
		
		$this->load->view('usergroup/edit_user_group', $this->data);
		$this->load->view('js_form');
        $this->load->view('js_checkbox');
        
	}

}
