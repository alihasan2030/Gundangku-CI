<?php
class DetailBarang extends CI_Model
{
    function get($id_barang) {
        $curl = curl_init($this->globals->api.'/GetDetailBarangById/'.$id_barang);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Authorization: Bearer '. $this->session->userdata("token")
            )
        );
        curl_setopt_array($curl, $this->globals->options);
        
        return json_decode(curl_exec($curl));
        
    }
}
