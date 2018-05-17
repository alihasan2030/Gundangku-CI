<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

	private $API = "";

	public function __construct() {

		parent::__construct();
		$this->API = "http://72aff47f.ngrok.io/api/Parts";
		$this->load->library('curl');

	}

	public function index() {

		$data['mahasiswa'] = json_decode($this->curl->simple_get($this->API."/GetAllBarang"));
		$this->load->view('v_mahasiswa', $data);
		
	}

	public function tambahBarang() {

		$data['kategori'] = json_decode($this->curl->simple_get($this->API."/GetAllKategori"));
		$this->load->view('tambah_barang', $data);
		
	}

	public function insertBarang() {

		$data['Id_barang'] = $this->input->post('id');
		$data['Xid_kategori'] = $this->input->post('kategori');
		$data['Xid_pengguna'] = 1;
		$data['Nama_barang'] = $this->input->post('nama');
		$data['Merk_barang'] = $this->input->post('merk');
		$data['Harga_barang'] = $this->input->post('harga');
		$data['Stok_barang'] = $this->input->post('stok');

		$insert = json_encode($data);

		$curl = curl_init($this->API."/InsertBarang");
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");

		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
		    'Content-Type: application/json',
    		'Content-Length: ' . strlen($insert),
    		'Authorization: Bearer '. 
    		)
		);

		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    	curl_setopt($curl, CURLOPT_POSTFIELDS, $insert); 

    	$result = curl_exec($curl);
     	curl_close($curl);

    	echo $result;

		$data['kategori'] = json_decode($this->curl->simple_get($this->API."/GetAllKategori"));
		$this->load->view('tambah_barang', $data);
		
	}

	public function deleteBarang($id) {

		$url = $this->API."/DeleteBarang/".$id;
	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, $url);
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
	    $result = curl_exec($ch);
	    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	    curl_close($ch);

	    echo $result;

    	$data['mahasiswa'] = json_decode($this->curl->simple_get($this->API."/GetAllBarang"));
		$this->load->view('v_mahasiswa', $data);
		
	}

}
