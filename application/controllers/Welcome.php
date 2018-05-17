<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
<<<<<<< HEAD
	public function index()
	{
		$this->load->view('welcome_message');
	}
=======
	function __construct($foo = null)
	{
		parent::__construct();
		$this->API = "http://857fc5cb.ngrok.io/api/Parts";
		$this->load->library('curl');
		$this->options = array(
			CURLOPT_RETURNTRANSFER => true,   // return web page
			CURLOPT_HEADER         => false,  // don't return headers
			CURLOPT_FOLLOWLOCATION => true,   // follow redirects
			CURLOPT_MAXREDIRS      => 10,     // stop after 10 redirects
			CURLOPT_ENCODING       => "",     // handle compressed
			CURLOPT_USERAGENT      => "test", // name of client
			CURLOPT_AUTOREFERER    => true,   // set referrer on redirect
			CURLOPT_CONNECTTIMEOUT => 120,    // time-out on connect
			CURLOPT_TIMEOUT        => 120,    // time-out on response
		); 
	}

	public function index()
	{
		redirect(base_url('/welcome/admin'));
	}

	public function admin()
	{
		$this->load->helper('url');
		$this->load->view('admin');
	}

	public function detail()
	{
		$this->load->helper('url');
		$this->load->view('detail');
	}

	public function detail_log()
	{
		$this->all();
		$this->load->view('detail_log', $result);
	}

	public function all()
	{
		$email = $this->session->userdata('email');
		$get = array('email' => $email);
		$result['req'] = $this->user->getreq()->result();
		$result['maman'] = $this->user->getid($get)->result();
		$this->load->helper('url');
		$this->load->view('header', $result);	
	}

	public function masuk()
	{

		$login = $this->input->post('email');
		$password = $this->input->post('password');
		$url = 'http://857fc5cb.ngrok.io/api/auth/token';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		$headers = array(
			'Content-Type:application/json',
				'Authorization: Basic '. base64_encode($login.":".$password) // <---
			);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_POSTFIELDS, base64_encode($login.":".$password)); 
		curl_setopt_array($ch, $this->options);
		$result = curl_exec($ch);
		curl_close($ch);

		$data_session = array(
			'token' => $result
		);

		$this->session->set_userdata($data_session);
		redirect(base_url('welcome/search'));
	}

	public function masuk_admin()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$where = array('email' => $email, 'password' => $password,'user_type' => 'admin');

		$cek = $this->user->cek_user("pengguna",$where)->num_rows();
		if ($cek > 0) {
			$data_session = array(
				'email' => $email,
				'status' => "login");

			$this->session->set_userdata($data_session);

			redirect(base_url('welcome/ad_login'));
		}else{
			redirect(base_url('welcome/admin'));
		}
	}

	public function show()
	{
		$this->all();

		if (isset($_POST['submit1']))
		{
			$query = $this->db->query("SELECT * FROM barang");
			$data['query'] = $query->result();
			$this->load->view('t_barang',$data);
			// $this->load->view('footer');	
		}
		else if (isset($_POST['submit2']))
		{
			$query = $this->db->query("SELECT * FROM detail_barang");
			$data['query'] = $query->result();
			$this->load->view('t_detail',$data);
			// $this->load->view('footer');
		}
	}

	public function keluar()
	{
		$this->session->sess_destroy();
		redirect(base_url('welcome/'));
	}

	public function result()
	{
		$result['req'] = $this->user->getreq()->result();
		$this->load->helper('url');
		$this->load->view('result', $result);
	}

	// public function login()
	// {
	
	// 	$email = $this->session->userdata('email');
	// 	$get = array('email' => $email);
	//     $result['req'] = $this->user->getreq()->result();
	//     $result['maman'] = $this->user->getid($get)->result();
	// 	$this->load->helper('url');
	//     $this->load->view('header', $result);
	//     $this->load->view('login', $result);
	// }

	public function ad_login()
	{
		$email = $this->session->userdata('email');
		$get = array('email' => $email);
		$result['req'] = $this->user->getreq()->result();
		$result['maman'] = $this->user->getid($get)->result();
		$this->load->helper('url');
		$this->load->view('header', $result);
		$this->load->view('ad_login', $result);
	}

	public function search()
	{
		$curl = curl_init($this->API."/GetAllBarang");
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Authorization: Bearer '. $this->session->userdata("token")
		)
	);
		curl_setopt_array($curl, $this->options);

		$data['barang'] =  json_decode(curl_exec($curl));

		$this->load->view('header');
		$this->load->view('login', $data);
	}

	public function deleton($id_barang)
	{
		$this->all();

		$query = $this->db->query("DELETE FROM barang WHERE ID_BARANG = '".$id_barang."';");
		$query = $this->db->query("SELECT * FROM barang");
		$data['query'] = $query->result();
		$this->load->view('t_barang',$data);
	}

	public function deleton_detail($id_detail)
	{
		$this->all();

		$query = $this->db->query("DELETE FROM detail_barang WHERE ID_DETAIL_BARANG = '".$id_detail."';");
		$query = $this->db->query("SELECT * FROM detail_barang");
		$data['query'] = $query->result();
		$this->load->view('t_detail',$data);
	}

	public function v_editon($id_barang)
	{
		$this->all();
		$datum['id'] = $id_barang;
		$this->load->view('v_editon');
	}

	public function editon()
	{
		$this->all();

		$query = $this->db->query("UPDATE barang SET HARGA_BARANG = '".$harga."', STOK_BARANG = '".$stok."' WHERE ID_BARANG = '".$id_barang."';");
		$query = $this->db->query("SELECT * FROM barang");
		$data['query'] = $query->result();
		$this->load->view('t_barang',$data);
	}

	public function tambah(){

		$curl = curl_init($this->API."/GetAllKategori");
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Authorization: Bearer '. $this->session->userdata("token")
		)
	);
		curl_setopt_array($curl, $this->options);

		$data['kategori'] =  json_decode(curl_exec($curl));
		$data['hasil'] =  "0";

		$this->load->view('header');
		$this->load->view('tambah_data', $data);

	}

	public function update(){

		$curl = curl_init($this->API."/GetAllKategori");
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Authorization: Bearer '. $this->session->userdata("token")
		)
	);
		curl_setopt_array($curl, $this->options);

		$data['kategori'] =  json_decode(curl_exec($curl));
		$data['hasil'] =  "0";

		$this->load->view('header');
		$this->load->view('update_data', $data);

	}

	public function insertBarang() {

		$id_brg = $this->input->post('id');

		$data['Id_barang'] = $this->input->post('id');
		$data['Xid_kategori'] = $this->input->post('kategori');
		$data['Xid_pengguna'] = 1;
		$data['Nama_barang'] = $this->input->post('nama');
		$data['Merk_barang'] = $this->input->post('merk');
		$data['Harga_barang'] = $this->input->post('harga');
		$data['Stok_barang'] = $this->input->post('stok');
		$data['Image_barang'] = $this->input->post('link');

		$data2['Id_detail_barang'] = "null";
		$data2['Id_barang'] = $this->input->post('id');
		$data2['Nomor_seri_detail'] = $this->input->post('seri');
		$data2['Status_detail'] = $this->input->post('status');
		$data2['Keterangan_detail'] = $this->input->post('ket');

		$data3['Id_spesifikasi'] = "null";
		$data3['Xid_barang'] = $this->input->post('id');
		$data3['Rincian_spesifikasi'] = $this->input->post('spek');

		$insert = json_encode($data);

		$curl = curl_init($this->API."/InsertBarang");
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
		$datanya['hasilBarang'] =  json_decode($dt);



		$insert2 = json_encode($data2);

		$curl2 = curl_init($this->API."/InsertDetailBarang");
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

		$dt2 = $result2;
		$datanya['hasilDetail'] =  $insert2;



		$insert3 = json_encode($data3);

		$curl3 = curl_init($this->API."/InsertSpesifikasi");
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
		$datanya['hasilSpek'] =  $insert3;



		$this->load->view('header');
		$this->load->view('konfirm_tambah_data', $datanya);

		/*echo $result;*/

		/*$data['kategori'] = json_decode($this->curl->simple_get($this->API."/GetAllKategori"));
		$this->load->view('tambah_barang', $data);*/
		/*redirect(base_url('welcome/search'));*/
		
	}

	public function deleteBarang($id) {

		$url = $this->API."/DeleteBarang/".$id;
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

		echo $result;

		redirect(base_url('welcome/search'));
		
	}
>>>>>>> 23644dd4d6c516819c2eede22980e4e8053be4d9
}
