<?php
class Spesifikasi extends CI_Model
{
	function get($id_barang) {
		$curl = curl_init($this->globals->api."/GetSpesifikasiById/" . $id_barang);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Authorization: Bearer '. $this->session->userdata("token")
			)
		);
		curl_setopt_array($curl, $this->globals->options);
		return json_decode(curl_exec($curl));
	}
	
	function insert($data) {
		$curl = curl_init($this->globals->api."/InsertSpesifikasi");
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Content-Length: ' . strlen($data),
			'Authorization: Bearer '. $this->session->userdata("token")
			)
		);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		$result = curl_exec($curl);
		curl_close($curl);
		
		return $result;
	}

	function delete($id) {
        $curl = curl_init($this->globals->api."/DeleteSpesifikasi/".$id);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Authorization: Bearer '. $this->session->userdata("token")
            )
        );
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
//        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        return $result;
    }
}
