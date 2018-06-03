<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parts extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('barang');
		$this->load->model('user');
		$this->load->model('kategori');
		$this->load->model('detailbarang');
		$this->load->model('spesifikasi');
		$this->load->library('curl');
		$this->load->library('session');
		$this->load->helper('url');
	}
	
	function index() {
		if($this->session->userdata('token')) {
			redirect(site_url('parts/all'));
		} else {
			redirect(site_url('parts/login'));
		}
	}
	
	function login() {
		if($this->session->userdata('token')) {
			redirect(site_url('parts/all'));
		} else {
			$this->load->view('v_login');
		}
	}
	
	function proses_login() {
		$username = $this->input->post('email');
		$password = $this->input->post('password');
		
		$result = $this->user->check_login($username, $password);
		
		if ($result) {
			$data_session = array(
				'username' => $login,
				'token' => $result
			);
			$this->session->set_userdata($data_session);
			redirect(site_url('parts/all'));
		} else {
			redirect(site_url());
		}
	}
	
	function keluar() {
		$this->session->sess_destroy();
		redirect(site_url());
	}
	
	function all() {
		if($this->session->userdata('token')) {
			$data['barang'] =  $this->barang->get_all();
			
			$this->load->view('header');
			$this->load->view('v_all', $data);
		} else {
			redirect(site_url());
		}
	}
	
	function tambah() {
		if($this->session->userdata('token')) {
			$data['kategori'] = $this->kategori->get_all();
			
			$this->load->view('header');
			$this->load->view('tambah_data', $data);
		} else {
			redirect(site_url());
		}
	}

	function tambah_detail($id_barang) {
		if($this->session->userdata('token')) {
			$data['barang'] = $this->barang->get($id_barang);
			$data['kategori'] = $this->detailbarang->get($id_barang);
			
			$this->load->view('header');
			$this->load->view('tambah_detail', $data);
		} else {
			redirect(site_url());
		}
	}
	
	function detail_barang($id_barang) {
		if($this->session->userdata('token')) {
			$data['result'] =  $this->barang->get($id_barang);
			$data['spesifikasi'] =  $this->spesifikasi->get($id_barang);
			
			$this->load->view('header');
			$this->load->view('v_detail', $data);
		} else {
			redirect(site_url());
		}
	}

	function detail_crud($id_barang) {
		if($this->session->userdata('token')) {
			$data['detail'] =  $this->detailbarang->get($id_barang);
			$data['barang'] =  $this->barang->get($id_barang);
			
			$this->load->view('header');
			$this->load->view('t_detail', $data);
		} else {
			redirect(site_url());
		}
	}
	
	function update($id_barang){
		$data['kategori'] = $this->kategori->get_all();
		$data['barang'] =  $this->barang->get($id_barang);
		$data['spesifikasi'] = $this->spesifikasi->get($id_barang);
		
		$this->load->view('header');
		$this->load->view('update_data', $data);	
	}

	function update_detail($id_barang){
		$data['detail'] = $this->detailbarang->get_id($id_barang);
		// $data['barang'] =  $this->barang->get($id_barang);
		
		$this->load->view('header');
		$this->load->view('update_detail', $data);	
	}

	//////////////////////////////////////////////////////////////////////////////////////////////
	////////// DI BAWAH INI BELUM YAKIN BENER ////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////
	
	function proses_insert_barang() {
		// get form data
		$data_barang['Id_barang'] = $this->input->post('id');
		$data_barang['Xid_kategori'] = $this->input->post('kategori');
		$data_barang['Xid_pengguna'] = 1;
		$data_barang['Nama_barang'] = $this->input->post('nama');
		$data_barang['Merk_barang'] = $this->input->post('merk');
		$data_barang['Harga_barang'] = $this->input->post('harga');
		$data_barang['Stok_barang'] = $this->input->post('stok');
		$data_barang['Image_barang'] = $this->input->post('link');
		// post data to api
		if($this->barang->insert(json_encode($data_barang))) {
			echo 'Insert data barang sukses<br>';
		} else {
			echo 'Insert data barang gagal<br>';
		}

		// data spesifikasi
		$data_spesifikasi['Xid_barang'] = $this->input->post('id');
		$data_spesifikasi['Rincian_spesifikasi'] = $this->input->post('spek');
		// post data
		if($this->spesifikasi->insert(json_encode($data_spesifikasi))) {
			echo 'Insert data spesifikasi sukses<br>';
		} else {
			echo 'Insert data spesifikasi gagal<br>';
		}

		sleep(3);
		redirect(site_url());
	}
	
	function proses_update_barang() {
		// data barang
		$data_barang['Id_barang'] = $this->input->post('id');
		$data_barang['Xid_kategori'] = $this->input->post('kategori');
		$data_barang['Xid_pengguna'] = 1;
		$data_barang['Nama_barang'] = $this->input->post('nama');
		$data_barang['Merk_barang'] = $this->input->post('merk');
		$data_barang['Harga_barang'] = $this->input->post('harga');
		$data_barang['Stok_barang'] = $this->input->post('stok');
		$data_barang['Image_barang'] = $this->input->post('link');
		// put
		$insert = json_encode($data_barang);
		$curl = curl_init($this->globals->api."/InsertBarang");
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Content-Length: ' . strlen($insert),
			'Authorization: Bearer '. $this->session->userdata("token")
			)
		);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $insert);
		$result = curl_exec($curl);
		curl_close($curl);

		// data spek
		$data_spesifikasi['Id_spesifikasi'] = $this->input->post('id_spek');
		$data_spesifikasi['Xid_barang'] = $this->input->post('id');
		$data_spesifikasi['Rincian_spesifikasi'] = $this->input->post('spek');

		redirect(site_url());		
	}
	
	function insertDetailBarang() {
		
		$n = $this->input->post('stok');
		
		for ($i = 0; $i < $n; $i++){
			$data2['Id_detail_barang'] = 1;
			$data2['Id_barang'] = $this->input->post('id');
			$data2['Nomor_seri_detail'] = $this->input->post('seri_' . $i);
			$data2['Status_detail'] = $this->input->post('status_' . $i);
			$data2['Keterangan_detail'] = $this->input->post('ket_' . $i);
			
			$insert2 = json_encode($data2);
			
			$curl2 = curl_init($this->globals->api."/InsertDetailBarang");
			curl_setopt($curl2, CURLOPT_CUSTOMREQUEST, "POST");
			
			curl_setopt($curl2, CURLOPT_HTTPHEADER, array(
				'Content-Type: application/json',
				'Content-Length: ' . strlen($insert2),
				'Authorization: Bearer ' . $this->session->userdata("token")
				)
			);
			
			curl_setopt($curl2, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl2, CURLOPT_POSTFIELDS, $insert2);
			
			$result2 = curl_exec($curl2);
			curl_close($curl2);
		}
		
		redirect(base_url('parts/search'));
		
	}

	function deleteDetail($id) {
		$url = $this->globals->api."/DeleteDetailBarang/".$id;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Authorization: Bearer '. $this->session->userdata("token")
			)
		);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
		$result = curl_exec($ch);
		$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);
		
		$this->deleteSpesifikasi($id);
	}
	
	function deleteSpesifikasi($id) {
		$url = $this->globals->api."/DeleteSpesifikasi/".$id;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Authorization: Bearer '. $this->session->userdata("token")
			)
		);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
		$result = curl_exec($ch);
		$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);
		
		$this->deleteBarang($id);
	}
	
	function deleteBarang($id) {
		$url = $this->globals->api."/DeleteBarang/".$id;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Authorization: Bearer '. $this->session->userdata("token")
			)
		);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
		$result = curl_exec($ch);
		$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);
		
		redirect(base_url('parts/all'));
	}
}
