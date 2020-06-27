<?php defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('max_execution_time', 120);
ini_set('memory_limit','512M'); 

class Dashboard extends CI_Controller {
	private $data;

	function __construct()
	{
		parent::__construct();
		$this->data['active'] = 'dashboard';
	} 
	
	function index()
	{
		$result = '';
		$angka = '';
		$jackpot = '';
		if (isset($_POST['angka'])){
			$angka = $_POST['angka'];
			switch (TRUE){
				case in_array($angka, range(1, 100)):
					$result = $angka;
					if (($angka % 3 == 0 && $angka % 5 == 0)){
						$result = 'Foo Bar';
						$jackpot = 'Horay... you got jackpot!';
					}else if ($angka % 3 == 0){
						$result = 'Foo';
					}else if ($angka % 5 == 0){
						$result = 'Bar';
					
					}
				break;
				
				default:
				print '<script>alert("Angka harus 1 - 100")</script>';

			}
			
		}
		
		$this->data['angka'] = $angka;
		$this->data['result'] = $result;
		$this->data['jackpot'] = $jackpot;

		$this->load->view('sidebar', $this->data);
		$this->load->view('body', $this->data);
		$this->load->view('foot', $this->data);
		
	}


}
