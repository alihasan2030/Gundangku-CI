<?php
class Kategori extends CI_Model
{
    function get_all() {
        $curl = curl_init($this->globals->api."/GetAllKategori");
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Authorization: Bearer '. $this->session->userdata("token")
            )
        );
        curl_setopt_array($curl, $this->globals->options);
        
        return json_decode(curl_exec($curl));
    }
}
