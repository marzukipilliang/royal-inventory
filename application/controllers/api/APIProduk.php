<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class APIProduk extends REST_Controller {
	
	function __construct()
	{
		parent::__construct();	
		$this->load->model('m_produk');
		$this->load->library('mycrud', array('tblname' => 'm_produk'));
		
	} 
	
	// Insert Data
	function add_post()
    {
        if(!$this->post('kode'))
        {
			$this->response(array('success' => FALSE, 'message' => 'Kode masih kosong'), 200);
        }
        
		$kode = strtoupper(trim($this->post('kode')));
		if (strlen($kode) != 7){
			$this->response(array('success' => FALSE, 'message' => 'Kode harus 7 karakter'), 200);
		}
		
		if(!$this->post('nm_produk'))
        {
			$this->response(array('success' => FALSE, 'message' => 'Nama Produk masih kosong'), 200);
        }
		
		$rs = $this->mycrud->getById('kode', $kode);
		if (!empty($rs)){
			$this->response(array('success' => FALSE, 'message' => 'kode sudah pernah digunakan'), 200);
		}
		
		$row = $this->mycrud->getById('nm_produk', strtoupper(trim($this->post('nm_produk'))));
		if (empty($row)){
			$object = array(
					'kode' => $kode,
					'nm_produk' => strtoupper(trim($this->post('nm_produk')))
				);

			$id = $this->mycrud->createData($object);
			if (!empty($id)){
                $this->response(array('success' => TRUE, 'message' => 'Insert berhasil!'), 200);
                			
			}else {
				$this->response(array('success' => FALSE, 'message' => 'Data tidak dapat diinput!'), 200);
			}

		}else {
			$this->response(array('success' => FALSE, 'message' => $this->post('nm_produk'). ' sudah pernah diinput!'), 200);
		}

		
    }
	
	
	// Edit Data
	function edit_post()
    {
		if(!$this->post('nm_produk'))
        {
			$this->response(array('success' => FALSE, 'message' => 'Nama Produk masih kosong'), 200);
        }
        
        $object = array(
					'nm_produk' => strtoupper(trim($this->post('nm_produk'))),
					'date_updated' => date('Y-m-d H:i:s')
				);
		$row = $this->mycrud->getById('nm_produk', $this->post('nm_produk'));
		if (empty($row)){
			
			$id = $this->mycrud->updateData('produk_id', $this->post('id'), $object);
			if (!empty($id)){
				$this->response(array('success' => TRUE, 'message' => 'Edit berhasil!'), 200);			
			
			}else {
				$this->response(array('success' => FALSE, 'message' => 'Data tidak bisa diedit'), 200);
			}
		
		}else {
			$this->response(array('success' => FALSE, 'message' => $this->post('nm_produk'). ' tidak berubah atau sudah pernah diinput!'), 200);
		}
    }
	
	// View Data
	function view_get()
    {
		
		$rs = $this->m_produk->getAllProduk();
		if ($rs)
		{
			// Set the response and exit
			$this->response($rs, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
		}
		else
		{
			// Set the response and exit
			$this->response([
				'success' => FALSE,
				'message' => 'No data were found'
			], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
		}
       
    }
	
	
	// Insert Konversi
	function konversi_post()
    {
		
        if(!$this->post('konversi'))
        {
			$this->response(array('success' => FALSE, 'message' => 'Konversi masih kosong'), 200);
        }
        
		$konversi = (int)$this->post('konversi');
		$produk_id = $this->post('produk_id');
        $satuan_id = $this->post('satuan_id');
		
		
		$object['konversi'] = abs($konversi); 
		$row = $this->m_produk->getKonversi($produk_id, $satuan_id);
		if (empty($row)){
			
			$object['produk_id'] = $produk_id;
			$object['satuan_id'] = $satuan_id;

			if ($this->m_produk->insertKonversi($object)){
                $this->response(array('success' => TRUE, 'message' => 'Insert berhasil!'), 200);
                			
			}else {
				$this->response(array('success' => FALSE, 'message' => 'Data tidak dapat diinput!'), 200);
			}

		}else {
			
			$object['date_updated'] = date('Y-m-d H:i:s');
			if ($this->m_produk->updateKonversi($produk_id, $satuan_id, $object)){
                $this->response(array('success' => TRUE, 'message' => 'Update berhasil!'), 200);
                			
			}else {
				$this->response(array('success' => FALSE, 'message' => 'Data tidak dapat diupdate!'), 200);
			}
		}

		
    }
	
	// Delete Konversi
	function delete_konversi_post()
    {
		
		$produk_id = $this->post('produk_id');
        $satuan_id = $this->post('satuan_id');
		
		if ($this->m_produk->deleteKonversi($produk_id, $satuan_id)){
			$this->response(array('success' => TRUE, 'message' => 'delete berhasil!'), 200);
						
		}else {
			$this->response(array('success' => FALSE, 'message' => 'Data tidak dapat didelete!'), 200);
		}


    }
	
	
	
	function view_konversi_get($id = null)
    {

		$rs = $this->m_produk->getAllKonversi($id);
		if ($rs)
		{
			// Set the response and exit
			$this->response($rs, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
		}
		else
		{
			// Set the response and exit
			$this->response([
				'success' => FALSE,
				'message' => 'No data were found'
			], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
		}
       
    }

}
