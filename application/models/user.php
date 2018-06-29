<?php

class User extends CI_Model
{
    function check_login($username, $password) {
        // $url = 'http://7fd6254b.ngrok.io/api/auth/token';
        $url = 'http://77289763.ngrok.io/api/auth/token';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		$headers = array(
			'Content-Type:application/json',
			'Authorization: Basic '. base64_encode($username.":".$password)
		);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_POSTFIELDS, base64_encode($username.":".$password));
		curl_setopt_array($ch, $this->globals->options);
		$result = curl_exec($ch);
        curl_close($ch);
        
        return $result;
    }
}
