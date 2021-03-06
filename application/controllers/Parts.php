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
		$this->load->model('logmodel');
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
	
	function login($hasil = null) {
		if($this->session->userdata('token')) {
			redirect(site_url('parts/all'));
		} else {
			$data['hasil'] = $hasil;
			$this->load->view('v_login', $data);
		}
	}
	
	function proses_login() {
		$username = $this->input->post('email');
		$password = $this->input->post('password');
		
		$result = $this->user->check_login($username, $password);
		if ($result) {
			$data_session = [
				'username' => $username,
				'token' => $result
			];
			$this->session->set_userdata($data_session);
			redirect(site_url('parts/all'));
		} else {
			redirect(site_url('parts/login/gagal'));
		}
	}
	
	function keluar() {
		$this->session->sess_destroy();
		redirect(site_url());
	}
	
	function all() {
	    if ($this->session->userdata('token')) {
            $like = $this->input->get('query');
            if ($like != null) {
                $data['barang'] =  $this->barang->get_search($like);

                $this->load->view('header');
                $this->load->view('v_all', $data);
            }else{
                $data['barang'] =  $this->barang->get_all();

                $this->load->view('header');
                $this->load->view('v_all', $data);
            }
        } else {
	        redirect(site_url());
        }
	}

	function log() {
	    if($this->session->userdata('token')) {
			$data['detail'] =  $this->logmodel->getAll();
			
			$this->load->view('header');
			$this->load->view('v_log', $data);
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
		$data_barang['Xid_pengguna'] = "1";
		$data_barang['Nama_barang'] = $this->input->post('nama');
		$data_barang['Merk_barang'] = $this->input->post('merk');
		$data_barang['Harga_barang'] = $this->input->post('harga');
		$data_barang['Stok_barang'] = $this->input->post('stok');
		$data_barang['Image_barang'] = $this->input->post('link');
		// put
		$insert = json_encode($data_barang);
		$curl = curl_init($this->globals->api."/UpdateBarang/".$data_barang['Id_barang']);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Content-Length: ' . strlen($insert),
			'Authorization: Bearer '. $this->session->userdata("token")
			)
		);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, false);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $insert);
		$result = curl_exec($curl);
		curl_close($curl);

		// data spek
		$data_spesifikasi['Id_spesifikasi'] = $this->input->post('id_spek');
		$data_spesifikasi['Xid_barang'] = $this->input->post('id');
		$data_spesifikasi['Rincian_spesifikasi'] = $this->input->post('spek');

		$id = $this->input->post('id');

        //var_dump(json_decode($insert));
		$this->proses_update_spesifikasi($id,$data_spesifikasi);
	}

	function proses_update_spesifikasi($id,$data_spesifikasi) {
		$insert = json_encode($data_spesifikasi);
		$curl = curl_init($this->globals->api."/UpdateSpesifikasi/".$data_spesifikasi['Id_spesifikasi']);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Content-Length: ' . strlen($insert),
			'Authorization: Bearer '. $this->session->userdata("token")
			)
		);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, false);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $insert);
		$result = curl_exec($curl);
		curl_close($curl);
		
		redirect(site_url('parts/detail_barang/'.$id));
	}

    function proses_hapus_barang($id_barang) {
        if($this->session->userdata('token')) {
            $this->spesifikasi->delete($id_barang);
            $this->detailbarang->delete($id_barang);
            $this->barang->delete($id_barang);
        }
        redirect(site_url());
    }

    function proses_insert_detail() {
	    $id_barang = $this->input->post('id_product');
		$data = [
			'id_barang' => $this->input->post('id_product'),
			'nomor_seri_detail' => $this->input->post('no_seri'),
			'status_detail' => $this->input->post('status'),
			'keterangan_detail' => $this->input->post('ket')
		];
		// post data to api
		if($this->detailbarang->insert(json_encode($data))) {
			echo 'Insert data barang sukses<br>';
		} else {
			echo 'Insert data barang gagal<br>';
		}

		sleep(3);
		redirect(site_url('parts/detail_crud/'.$id_barang));
	}

	function proses_update_detail() {
		// data barang
        $id_barang = $this->input->post('id_product');
		$id = $this->input->post('id_detail');
		$data = [
			'id_detail_barang' => $id,
			'id_barang' => $this->input->post('id_product'),
			'nomor_seri_detail' => $this->input->post('no_seri'),
			'status_detail' => $this->input->post('status'),
			'keterangan_detail' => $this->input->post('ket')
		];
		// post data to api
		if($this->detailbarang->update($id, json_encode($data))) {
			echo 'Insert data barang sukses<br>';
		} else {
			echo 'Insert data barang gagal<br>';
		}

		sleep(3);
        redirect(site_url('parts/detail_crud/'.$id_barang));
	}

    function proses_hapus_detail($id, $id_barang) {
        if($this->session->userdata('token')) {
            $this->detailbarang->delete_by_id($id);
        }
        redirect(site_url('parts/detail_crud/'.$id_barang));
    }
}
