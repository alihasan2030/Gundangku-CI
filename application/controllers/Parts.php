<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parts extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('barang');
		$this->load->model('user');
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
			$curl = curl_init($this->globals->api."/GetAllKategori");
			curl_setopt($curl, CURLOPT_HTTPHEADER, array(
				'Content-Type: application/json',
				'Authorization: Bearer '. $this->session->userdata("token")
				)
			);
			curl_setopt_array($curl, $this->globals->options);
			
			$data['kategori'] =  json_decode(curl_exec($curl));
			$data['hasil'] =  "0";
			
			$this->load->view('header');
			$this->load->view('tambah_data', $data);
		} else {
			redirect(site_url());
		}
	}
	
	function detailBarang($id_barang) {
		if($this->session->userdata('token')) {
			$curl = curl_init($this->globals->api.'/GetDetailBarangById/'.$id_barang);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array(
				'Content-Type: application/json',
				'Authorization: Bearer '. $this->session->userdata("token")
				)
			);
			curl_setopt_array($curl, $this->globals->options);
			
			$data['result'] =  json_decode(curl_exec($curl));
			
			$this->load->view('header');
			$this->load->view('v_detail', $data);
		} else {
			redirect(site_url());
		}
	}
	
	function update($id){
		
		$curl = curl_init($this->globals->api."/GetAllKategori");
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Authorization: Bearer '. $this->session->userdata("token")
			)
		);
		curl_setopt_array($curl, $this->globals->options);
		$data['kategori'] =  json_decode(curl_exec($curl));
		
		$curl = curl_init($this->globals->api."/GetBarangById/" . $id);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Authorization: Bearer '. $this->session->userdata("token")
			)
		);
		curl_setopt_array($curl, $this->globals->options);
		$data['barang'] =  json_decode(curl_exec($curl));
		
		$curl = curl_init($this->globals->api."/GetDetailBarangById/" . $id);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Authorization: Bearer '. $this->session->userdata("token")
			)
		);
		curl_setopt_array($curl, $this->globals->options);
		$data['detail_barang'] =  json_decode(curl_exec($curl));
		
		$curl = curl_init($this->globals->api."/GetSpesifikasiById/" . $id);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Authorization: Bearer '. $this->session->userdata("token")
			)
		);
		curl_setopt_array($curl, $this->globals->options);
		$data['spesifikasi'] =  json_decode(curl_exec($curl));
		
		$data['hasil'] =  "0";
		
		$this->load->view('header');
		$this->load->view('update_data', $data);	
	}
	
	function updateBarang() {
		$id_brg = $this->input->post('id');
		$id_spek = $this->input->post('id_spek');
		$byk = $this->input->post('byk');
		
		$data['Id_barang'] = $this->input->post('id');
		$data['Xid_kategori'] = $this->input->post('kategori');
		$data['Xid_pengguna'] = 1;
		$data['Nama_barang'] = $this->input->post('nama');
		$data['Merk_barang'] = $this->input->post('merk');
		$data['Harga_barang'] = $this->input->post('harga');
		$data['Stok_barang'] = $this->input->post('stok');
		$data['Image_barang'] = $this->input->post('link');
		
		$data2['Id_detail_barang'] = 1;
		$data2['Id_barang'] = $this->input->post('id');
		$data2['Nomor_seri_detail'] = $this->input->post('seri');
		$data2['Status_detail'] = $this->input->post('status');
		$data2['Keterangan_detail'] = $this->input->post('ket');
		
		$data3['Id_spesifikasi'] = 1;
		$data3['Xid_barang'] = $this->input->post('id');
		$data3['Rincian_spesifikasi'] = $this->input->post('spek');
		
		$insert = json_encode($data);
		
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
		
		$dt = $result;
		$datanya['hasilBarang'] = json_decode($dt);
		
		$datanya['hasillBarang'] = $dt;
		$datanya['hasilDetail'] = json_decode($this->insertDetailBarang($data2));
		$datanya['hasilSpek'] = json_decode($this->insertSpesifikasi($data3));
		
		$this->load->view('header');
		$this->load->view('konfirm_tambah_data', $datanya);
		
		/*echo $result;*/
		
		/*$data['kategori'] = json_decode($this->curl->simple_get($this->globals->api."/GetAllKategori"));
		$this->load->view('tambah_barang', $data);*/
		/*redirect(base_url('parts/search'));*/
		
	}
	
	function insertBarang() {
		
		$id_brg = $this->input->post('id');
		$stoks = $this->input->post('stok');
		
		$data['Id_barang'] = $this->input->post('id');
		$data['Xid_kategori'] = $this->input->post('kategori');
		$data['Xid_pengguna'] = 1;
		$data['Nama_barang'] = $this->input->post('nama');
		$data['Merk_barang'] = $this->input->post('merk');
		$data['Harga_barang'] = $this->input->post('harga');
		$data['Stok_barang'] = $this->input->post('stok');
		$data['Image_barang'] = $this->input->post('link');
		
		$data3['Id_spesifikasi'] = 1;
		$data3['Xid_barang'] = $this->input->post('id');
		$data3['Rincian_spesifikasi'] = $this->input->post('spek');
		
		$insert = json_encode($data);
		
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
		
		$dt = $result;
		/*$datanya['hasilBarang'] = json_decode($dt);
		
		$datanya['hasillBarang'] = $dt;
		$datanya['hasilSpek'] = */json_decode($this->insertSpesifikasi($data3));
		
		redirect(base_url('parts/detailBarang/' . $stoks . '/' . $id_brg));
		
		/*echo $result;*/
		
		/*$data['kategori'] = json_decode($this->curl->simple_get($this->globals->api."/GetAllKategori"));
		$this->load->view('tambah_barang', $data);*/
		/*redirect(base_url('parts/search'));*/
		
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
	
	function insertSpesifikasi($data3) {
		
		$insert3 = json_encode($data3);
		
		$curl3 = curl_init($this->globals->api."/InsertSpesifikasi");
		curl_setopt($curl3, CURLOPT_CUSTOMREQUEST, "POST");
		
		curl_setopt($curl3, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Content-Length: ' . strlen($insert3),
			'Authorization: Bearer '. $this->session->userdata("token")
			)
		);
		
		curl_setopt($curl3, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl3, CURLOPT_POSTFIELDS, $insert3);
		
		$result3 = curl_exec($curl3);
		curl_close($curl3);
		
		$dt3 = $result3;
		return $dt3;
		
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
