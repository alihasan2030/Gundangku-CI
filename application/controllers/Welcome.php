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
	function __construct($foo = null)
	{
		parent::__construct();
		$this->load->model('user');
	}

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('welcome_message');
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
		$email = $this->session->userdata('email');
		$get = array('email' => $email);
	    $result['req'] = $this->user->getreq()->result();
	    $result['maman'] = $this->user->getid($get)->result();
		$this->load->helper('url');
	    $this->load->view('detail_log', $result);
	}

	public function masuk()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$where = array('email' => $email, 'password' => $password);

		$cek = $this->user->cek_user("pengguna",$where)->num_rows();
		if ($cek > 0) {
			$data_session = array(
				'email' => $email,
				'status' => "login");

			$this->session->set_userdata($data_session);

			redirect(base_url('welcome/search'));
		}else{
			redirect(base_url('welcome/'));
		}
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
		$email = $this->session->userdata('email');
		$get = array('email' => $email);
	    $result['req'] = $this->user->getreq()->result();
	    $result['maman'] = $this->user->getid($get)->result();
		$this->load->helper('url');
	    $this->load->view('header', $result);
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
		$email = $this->session->userdata('email');
		$get = array('email' => $email);
	    $result['req'] = $this->user->getreq()->result();
	    $result['maman'] = $this->user->getid($get)->result();
		$this->load->helper('url');

		$arg1 = $this->input->post('search');

		$this->load->view('header', $result);
		$query = $this->db->query("SELECT * FROM barang Where NAMA_BARANG LIKE '%".$arg1."%';");

		$data['query'] = $query->result();

		$this->load->view('login', $data, $result);
		// $this->load->view('footer');
	}

	public function deleton($id_barang)
	{
		$email = $this->session->userdata('email');
		$get = array('email' => $email);
	    $result['req'] = $this->user->getreq()->result();
	    $result['maman'] = $this->user->getid($get)->result();
		$this->load->helper('url');
		$this->load->view('header', $result);

		$query = $this->db->query("DELETE FROM barang WHERE ID_BARANG = '".$id_barang."';");
		$query = $this->db->query("SELECT * FROM barang");
		$data['query'] = $query->result();
		$this->load->view('t_barang',$data);
	}
}
