<?php 
/**
* 
*/
class User extends CI_Model
{
	function cek_user($table,$where)
	{
		return $this->db->get_where($table,$where);
	}

	public function getreq()
	{
	    return $this->db->get('barang');
	}

	public function getid($where)
	{
	    return $this->db->get_where('pengguna', $where);
	}
	// function tambah_user($data)
	// {
	// 	return $this->db->insert("user",$data);
	// }
}
 ?>